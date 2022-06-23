require('twbs-pagination')

$.ajax({
    url: `/api/employers`,
    type: 'get',
    dataType: 'json',
    success: function (data) {
        let numberOfPages = data['last_page'];
        if (numberOfPages !== 1) {
            $('#pagination-demo').twbsPagination({
                totalPages: numberOfPages,
                visiblePages: 5,
                next: '&raquo;',
                prev: '&laquo',
                first: '',
                last: '',
                onPageClick: function (event, page) {
                    getEmployers(page)
                }
            });
        } else {
            $('.pagination').empty()
        }
    }
});
