@extends('base')

@section('content')
    <style>
        .alert-success,
        .alert-danger{
            display: none;
        }
    </style>

    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert"> </div>
            <div class="alert alert-danger" role="alert"> </div>
            <form id="employer_form" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" id="email" class="form-control" name="email" required placeholder="Введите email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Фамилия</label>
                    <div class="col-sm-8">
                        <input type="text" id="fio" class="form-control" name="secondName" placeholder="Введите фамилию">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Имя</label>
                    <div class="col-sm-8">
                        <input type="text" id="fio" class="form-control" name="firstName" placeholder="Введите имя">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Отчество</label>
                    <div class="col-sm-8">
                        <input type="text" id="fio" class="form-control" name="lastName" placeholder="Введите отчество (если имеется)">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Возраст</label>
                    <div class="col-sm-8">
                        <input type="number" id="age" class="form-control" name="age" placeholder="Введите возраст">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Стаж работы</label>
                    <div class="col-sm-8">
                        <input type="number" id="seniority" class="form-control" name="seniority" placeholder="Введите стаж работы">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Средняя зарплата</label>
                    <div class="col-sm-8">
                        <input type="text" id="average_salary" class="form-control" name="average_salary" placeholder="Введите вашу среднюю зарплату">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Фото</label>
                    <div class="col-sm-8">
                        <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="photo" id="photo">
                    </div>
                </div>
            </form>
            <button class="btn btn-primary" id="employer_add_btn" style="margin-top: 10px">Сохранить</button>
        </div>
        <div class="col-md-6">
            <div class="employer_card" id="employer_card">

            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ФИО</th>
            <th scope="col">Возраст</th>
            <th scope="col">Фотография</th>
        </tr>
        </thead>
        <tbody id="employers_table">

        </tbody>
    </table>

@endsection
