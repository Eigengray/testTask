let searchParams = new URLSearchParams(window.location.search)
if (searchParams.has('page')) {
    console.log(searchParams.get('page'))
    getEmployers(searchParams.get('page'))
} else {
    getEmployers(1)
}

function getEmployers(page_number) {
    $.ajax({
        url: `/api/employers?page=${page_number}`,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            $('#employers_table').empty();
            if ( data.data.length === 0 ){
                $('#employers_table').empty().append(
                    `
                    <tr>
                        <th colSpan="4" style="text-align: center">
                            <h4>Нет данных</h4>
                        </th>
                    </tr>
                    `
                );
            } else {
                data.data.map((value, key) => {
                    $('#employers_table').append(
                        `<tr>
                        <td> ${value.FIO} </td>
                        <td> ${value.age} </td>
                        <td> ${value.photo ? value.photo : 'Отсутствует'} </td>
                        <td>
                            <button onclick="showEmployer(${value.id})" class="btn btn-sm btn-primary">Подробнее</button>
                        </td>
                    </tr>`
                    );
                });
            }
        },
        error: function (data) {
            $('.alert-success').empty().hide()
            $('.alert-danger').empty().show().append(data);
        },
    });
}

window.getEmployers = getEmployers
