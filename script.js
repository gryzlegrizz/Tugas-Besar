const userBoxTemplate = document.querySelector("[data-user-template]")

fetch("https://jsonplaceholder.typicode.com/users")
    .then(res => res.json())
    .then(data => {
        data.forEach(user => {
            const box = userBoxTemplate.content.cloneNode(true).children[0]
            const header = box.querySelector("[data-header")
            const body = box.querySelector("[data-body")
            header.textContent = user.ftitle
            body.textContent = user.fname
            console.log(user)
        })
    })