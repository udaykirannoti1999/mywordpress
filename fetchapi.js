function loadPosts() {
  fetch("https://jsonplaceholder.typicode.com/posts?_limit=5")
    .then(response => response.json())
    .then(data => {
      const postsDiv = document.getElementById("posts");
      postsDiv.innerHTML = "";
      data.forEach(post => {
        const postEl = document.createElement("div");
        postEl.innerHTML = `<h4>${post.title}</h4><p>${post.body}</p><hr/>`;
        postsDiv.appendChild(postEl);
      });
    })
    .catch(error => console.error("Error:", error));
}
