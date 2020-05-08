const categoryList = document.getElementById('category-list')
const productList = document.getElementById('product-list')
const inputBtn = document.getElementById('submitBtn')
const categoryButton = document.getElementById('category-button')
const productsBox = document.getElementById('products-box')
const categoryTitle = document.getElementById('category-title')
var verify = 0
var selectedCategory

categoryButton.addEventListener('click', e => {
  if (verify === 0) {
    showCategories()
    verify = 1
  }
  else {
    var lastChild = categoryList.lastElementChild;
    while (lastChild) {
      categoryList.removeChild(lastChild);
      lastChild = categoryList.lastElementChild;
    }
    verify = 0
  }
})

categoryList.addEventListener('click', async e => {
  const categoryId = e.target.value
  const categoryName = e.target.innerHTML
  selectedCategory = categoryId

  categoryTitle.innerHTML = categoryName
  document.getElementById("category-title").style.padding = "7px 10px 7px 5px"

  const products = await getCategoryProducts(categoryId)
  productList.innerHTML = ''

  products.forEach(product => {
    const article = document.createElement('article')
    const divName = document.createElement('div')
    const divDescription = document.createElement('div')
    const divPrice = document.createElement('div')
    const divImg = document.createElement('img')
    const button = document.createElement('button')
    button.innerText = 'Delete'
    button.id = product.id

    divName.innerText = product.name
    divName.id = 'titleID'

    divPrice.innerText = "Price: $" + product.price
    divPrice.id = 'priceID'

    divDescription.innerText = product.description
    divDescription.id = 'descriptionID'

    divImg.src = product.image
    divImg.id = 'imageID'

    productList.append(article)
    article.append(divName, divDescription, divPrice, divImg, button)
    button.addEventListener('click', e => {
      const buttonId = e.target.id
      deleteProduct(buttonId)
    })
  })
})

inputBtn.addEventListener('mouseover', e => {
  formInsert();
})

function formInsert() {
  var selectedId = selectedCategory;
  var regex = /^[0-9]+$/;

  if (!selectedId) {
    alert("Please select a category");
  }
  else {
    var inputID = document.getElementById('productID').value
    var inputName = document.getElementById('name').value
    if (!inputID) {
      alert("Please insert the ID")
    }
    else if (!regex.test(inputID)){
      alert("The ID must be a number")
    }
    else if (!inputName) {
      alert("Please insert the name")
    }
    else {
      var inputDescription = document.getElementById('description').value
      if (!inputDescription) {
        inputDescription = ' '
      }
      var inputPrice = document.getElementById('price').value
      if (!inputPrice) {
        inputPrice = ' '
      }
      var inputImage = document.getElementById('image').value
      if (!inputImage) {
        inputImage = ' '
      }
      var inputQuantity = document.getElementById('quantity').value
      if (!inputQuantity) {
        inputQuantity = ' '
      }
      insertProduct(inputID, inputName, inputDescription, inputPrice, inputImage, inputQuantity, selectedId)
      document.getElementById("formular").reset()
    }
  }
}

function showCategories() {
  return queryFetch(`
  query {
    allCategories {
      id
      name
    }
  }
`).then(data => {
    data.data.allCategories.forEach(category => {
      const listElement = document.createElement('li')
      listElement.id = 'list-element'
      listElement.value = category.id
      listElement.innerText = category.name
      categoryList.append(listElement)
    })
  })
}

function getCategoryProducts(categoryId) {
  return queryFetch(`
query getProducts($id: ID!) {
  Category(id: $id) {
    Products {
    id
    name
    description
    price
    image
    }
  }
}
`, { id: categoryId }).then(data => {
    return data.data.Category.Products
  })
}

function deleteProduct(productId) {
  return queryFetch(`
mutation ($id :ID!) {
  removeProduct(id:$id)
}
`, {id: productId}

  )
}

function insertProduct(productId, productName, productDescription, productPrice, productImage, productQuantity, productCategoryID) {
  return queryFetch(`
mutation ($id: ID!
          $name: String!
          $description: String!
          $price: Float!
          $image: String!
          $quantity: Int!
          $category_id: ID!) {
            createProduct(id: $id, name:$name, description:$description, price:$price, image:$image, quantity:$quantity, category_id:$category_id) {
              id
            }
}
`, { id: productId, name: productName, description: productDescription, price: productPrice, image: productImage, quantity: productQuantity, category_id: productCategoryID }
  )
}


function queryFetch(query, variables) {
  return fetch('http://localhost:3000', {
    method: 'POST',
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      query: query,
      variables: variables
    })
  }).then(res => res.json())
}