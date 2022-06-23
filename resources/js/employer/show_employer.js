function showEmployer(id) {
    $.ajax({
        url: `/api/employers/${id}`,
        type: 'get',
        dataType: 'json',
        success: function (data) {
            $('#employer_card').empty().append(
                `
                    <img class="employer_card-img" src="${data.photo ? '/images/' + data.photo : 'https://via.placeholder.com/150/'}" alt="photo">
                    <div class="employer_card-body">
                        <h5 class="employer_card-title">ФИО: ${data.FIO}</h5>
                        <h5 class="employer_card-title">Email: ${data.email}</h5>
                        <h5 class="employer_card-title">Возвраст: ${data.age}</h5>
                        <h5 class="employer_card-title">Стаж работы: ${data.seniority}</h5>
                        <h5 class="employer_card-title">Средняя зарплата: ${data.average_salary}</h5>
                        <button class="btn btn-sm btn-danger" onclick="deleteEmployer(${data.id})">Удалить</button>
                    </div>
                `
            );
        },
        error: function (data) {
            $('.alert-success').empty().hide()
            $('.alert-danger').empty().show().append(data);
        },
    });
}

window.showEmployer = showEmployer
