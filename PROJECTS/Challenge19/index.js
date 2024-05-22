const library = [
  {
    title: "Book 1",
    author: "Author 1",
    maxPages: 200,
    onPage: 50,
  },
  {
    title: "Book 2",
    author: "Author 2",
    maxPages: 300,
    onPage: 100,
  },
  {
    title: "Book 3",
    author: "Author 3",
    maxPages: 150,
    onPage: 25,
  },
  {
    title: "Book 4",
    author: "Author 4",
    maxPages: 200,
    onPage: 200,
  },
];

const bookList = document.getElementById("bookList");

library.forEach(function (e) {
  let listItem = document.createElement("li");

  listItem.textContent = e.title + " by " + e.author;

  bookList.appendChild(listItem);
});



const bookList2 = document.getElementById("bookList2");

library.forEach(function (e) {
  let listItem2 = document.createElement("li");

  if (e.maxPages === e.onPage) {
    listItem2.textContent = `You have already read ${e.title} by ${e.author}`;
    listItem2.classList.add("green");
  } else {
    listItem2.textContent = `You still need to read ${e.title} by ${e.author}`;
    listItem2.classList.add("red");
  }

  bookList2.appendChild(listItem2);
});

// TABLE

const bookTable = document
  .getElementById("bookTable")
  .getElementsByTagName("tbody")[0];

library.forEach(function (e) {
  let row = bookTable.insertRow();

  let titleCell = row.insertCell(0);
  let authorCell = row.insertCell(1);
  let maxPagesCell = row.insertCell(2);
  let OnPageCell = row.insertCell(3);
  titleCell.textContent = e.title;
  authorCell.textContent = e.author;
  maxPagesCell.textContent = e.maxPages;
  OnPageCell.textContent = e.onPage;

  let progressCell = row.insertCell(4);
  let progressBar = document.createElement("progress");

  let percentage = (e.onPage / e.maxPages) * 100;
  progressBar.value = percentage.toFixed(2);
  progressBar.max = 100;

  let progressValue = document.createElement("span");

  progressCell.appendChild(progressBar);
  progressCell.appendChild(progressValue);
});


const addBookForm = document.getElementById("addBookForm");

addBookForm.addEventListener("submit", function (event) {
  event.preventDefault(); 

  let title = document.getElementById("title").value;
  let author = document.getElementById("author").value;
  let maxPages = parseInt(document.getElementById("maxPages").value);
  let onPage = parseInt(document.getElementById("onPage").value);

  if (isNaN(maxPages) || isNaN(onPage)) {
    alert("Invalid input. Please enter valid numbers.");
    return;
  }
  if (maxPages < onPage) {
    alert("Invalid input. You cannot read more pages than the books maximum amount of pages");
    return;
  }

  let newBook = {
    title: title,
    author: author,
    maxPages: maxPages,
    onPage: onPage,
  };

  library.push(newBook);


  let row = bookTable.insertRow();

  let titleCell = row.insertCell(0);
  let authorCell = row.insertCell(1);
  let maxPagesCell = row.insertCell(2);
  let OnPageCell = row.insertCell(3);

  let progressCell = row.insertCell(4);

  titleCell.textContent = newBook.title;
  authorCell.textContent = newBook.author;
  maxPagesCell.textContent = newBook.maxPages;
  OnPageCell.textContent = newBook.onPage;

  let progressBar = document.createElement("progress");
  let progressValue = document.createElement("span");

  let percentage = (newBook.onPage / newBook.maxPages) * 100;
  progressBar.value = percentage.toFixed(2);

  progressBar.max = 100;
  progressCell.appendChild(progressBar);
  progressCell.appendChild(progressValue);
  addBookForm.reset();
});
