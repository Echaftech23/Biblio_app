
let search_input = document.getElementById('search-input');

search_input.addEventListener('keyup', (event) => {
    let value = event.target.value;

    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = () => {
        if (ajax.readyState === 4 && ajax.status === 200) {
            const data = JSON.parse(ajax.responseText);
            showSearchData(data);
        }
    };

    ajax.open('GET', `search.php?search=${value}`, true);
    ajax.send();
})


function showSearchData(data) {
    const tableBody = document.getElementById('userTableBody');
    tableBody.innerHTML = '';

    data.forEach(book => {

        const rowTemplate = `                

            <tr>
                <td> ${book.id}</td>
                <td> ${book.title}</td>
                <td> ${book.author}</td>
                <td> ${book.genre}</td>
                <td> ${book.publication_year}</td>
                <td> ${book.total_copies}</td>
                <td> ${book.available_copies}</td>
                <td class="table-actions d-flex">
                    <a href="edit.php?book_id=${book.id}" class="btn btn-primary btn-sm ">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm ml-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                </td>
            </tr>
        `;

        tableBody.innerHTML += rowTemplate;
    });
}