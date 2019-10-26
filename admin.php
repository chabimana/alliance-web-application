<!DOCTYPE html>
<html xmlns:sec="http://www.w3.org/1999/xhtml" xmlns:th="http://www.w3.org/1999/xhtml">
<head th:replace="common/header :: common-header">

    <?php
    // core configuration
    include_once "config/core.php";
    // set page title
    $page_title = "Index";

    // include login checker
    $require_login = true;
    include_once "login_checker.php";

    // include page header HTML
    include_once 'view/common/header.php';

    // to prevent undefined index notice
    $action = isset( $_GET[ 'action' ] ) ? $_GET[ 'action' ] : "";

    // if login was successful
    if ($action == 'login_success') {
        echo "<div class='alert alert-info'>";
        echo "<strong>Hi " . $_SESSION[ 'firstname' ] . ", welcome back!</strong>";
        echo "</div>";
    } // if user is already logged in, shown when user tries to access the login page
    else if ($action == 'already_logged_in') {
        echo "<div class='alert alert-info'>";
        echo "<strong>You are already logged in.</strong>";
        echo "</div>";
    }

    // content once logged in
    echo "<div class='alert alert-info'>";
    echo "Content when logged in will be here. For example, your premium products or services.";
    echo "</div>";

    echo "</div>";


    ?>
</head>
<body class="hold-transition skin-blue fixed layout-top-nav">
<div class="wrapper">
    <!-- Main Header -->
    <header th:replace="common/header :: main-header"></header>
    <!-- ADMIN container -->
    <div class="content-wrapper" sec:authorize="hasRole('ROLE_ADMIN')">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Content<small>MIS</small>
                </h1>
            </section>
            <!-- /.content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 th:text="${leaderscount}"></h3>
                                <p>Leaders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-rose"></i>
                            </div>
                            <a href="/listleaders" class="small-box-footer">More info <i
                                        class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3 th:text="${countprograms}"></h3>
                                <p>Programs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                        class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row" th:if="${programList} or ${leadersList}">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" th:if="${programList}">All Programs</h3>
                            <h3 class="box-title" th:if="${leadersList}">All Leaders</h3>
                        </div>
                        <div class="col-md-6">
                            <a th:if="${programList}" class="btn btn-success pull-left"
                               href="/addprograms">Add New Program Content </a> <a
                                    th:if="${leadersList}" class="btn btn-success pull-left"
                                    href="/addleaders"> <i class="fa fa-user"></i> Add New
                                leaders
                            </a><a class="btn btn-success pull-left" href="/preview">Preview
                                Website Homepage </a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" th:if="${programList}">
                            <table id="programs" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="10%">Program Title</th>
                                    <th class="justify">Program Content</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr th:each="program, iStat: ${programList}">
                                    <td th:text="${iStat.index+1}"/>
                                    <td th:text="${program.title}"/>
                                    <td th:text="${program.content}"/>
                                    <td><a class="btn btn-info"
                                           th:href="@{'/update/' + ${program.id}}">Update </a></td>
                                    <td><a class="btn btn-info"
                                           th:href="@{'/delete/' + ${program.id}}">Delete</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-body" th:if="${leadersList}">
                            <table id="leaders" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Names</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr th:each="list, iStat: ${leadersList}">
                                    <td th:text="${iStat.index+1}"/>
                                    <td class="text-center"><img height="150" width="150"
                                                                 class="img-circle center" alt="100x100"
                                                                 th:src="@{/showimage/{id}(id=${list.id})}"
                                                                 data-holder-rendered="true"/></td>
                                    <td th:text="${list.names}"/>
                                    <td th:text="${list.position}"/>
                                    <td th:text="${list.email}"/>
                                    <td><a class="btn btn-info"
                                           th:href="@{'/updateleader/' + ${list.id}}">Update</a> <a
                                                class="btn btn-info"
                                                th:href="@{'/deleteleader/' + ${list.id}}">Delete </a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box" th:if="${programs}">
                <div class="box-header">
                    <h3 class="box-title">
                        Program Details <small>Tile and Content</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm"
                                data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-default btn-sm"
                                data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                    <form th:action="@{/addprograms}" action=""
                          th:object="${programs}" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   placeholder="Enter Title" th:field="*{title}"/> <span
                                    class="error text-danger" th:if="${#fields.hasErrors('title')}"
                                    th:errors="*{title}"></span> <span class="error text-danger"
                                                                       th:text="${message}"></span>

                        </div>
                        <textarea class="textarea" placeholder="enter content"
                                  th:field="*{content}"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        <span class="error text-danger"
                              th:if="${#fields.hasErrors('content')}" th:errors="*{content}"></span>
                        <span class="error text-danger" th:text="${message}"></span>
                        <div class="form-group">
                            <input type="submit" value="Save"
                                   class="btn btn-primary py-3 px-5"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row block-9" th:if="${program}">
                <div class="col-md-7 order-md-last d-flex">
                    <form class="form" th:action="@{/update}" action=""
                          th:object="${program}" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control"
                                   th:value="${program.id}" th:field="*{id}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   th:text="${program.title}" placeholder="Enter Title"
                                   th:field="*{title}"/> <span class="error text-danger"
                                                               th:if="${#fields.hasErrors('title')}"
                                                               th:errors="*{title}"></span>
                            <span class="error text-danger" th:text="${message}"></span>

                        </div>
                        <div class="form-group">
								<textarea name="" id="" cols="30" rows="7" class="form-control"
                                          th:text="${program.content}" th:field="*{content}"></textarea>
                            <span class="error text-danger"
                                  th:if="${#fields.hasErrors('content')}" th:errors="*{content}"></span>
                            <span class="error text-danger" th:text="${message}"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save"
                                   class="btn btn-primary py-3 px-5"/>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row block-9" th:if="${dprogram}">
                <div class="col-md-7 order-md-last d-flex">
                    <form class="form" th:action="@{/delete}" action=""
                          th:object="${dprogram}" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control"
                                   th:value="${dprogram.id}" th:field="*{id}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   th:text="${dprogram.title}" th:field="*{title}"/>
                        </div>
                        <div class="form-group">
								<textarea name="" id="" cols="30" rows="7" class="form-control"
                                          th:text="${dprogram.content}" th:field="*{content}"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Delete"
                                   class="btn btn-primary py-3 px-5"/>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-md-6" th:if="${leaders}">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Leader's Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" th:action="@{/addleaders}" action=""
                          th:object="${leaders}" enctype="multipart/form-data"
                          method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Full Name</label> <input
                                        type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="enter full name" th:field="*{names}"/> <span
                                        class="error text-danger"
                                        th:if="${#fields.hasErrors('names')}" th:errors="*{names}"></span>
                                <span class="error text-danger" th:text="${names}"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label> <input
                                        type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" th:field="*{email}"/> <span
                                        class="error text-danger"
                                        th:if="${#fields.hasErrors('email')}" th:errors="*{email}"></span>
                                <span class="error text-danger" th:text="${email}"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Leader's Position</label> <input
                                        type="text" class="form-control" placeholder="ex: President"
                                        th:field="*{position}"/><span class="error text-danger"
                                                                      th:if="${#fields.hasErrors('position')}"
                                                                      th:errors="*{position}"></span> <span
                                        class="error text-danger" th:text="${position}"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image input</label> <input
                                        type="file" name="file"/><span class="error text-danger"
                                                                       th:if="${#fields.hasErrors('image')}"
                                                                       th:errors="*{image}"></span>
                                <span class="error text-danger" th:text="${image}"></span>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row block-9" th:if="${leader}">
                <div class="col-md-7 order-md-last d-flex">
                    <form class="form" th:action="@{/updateleader}" action=""
                          th:object="${leader}" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control"
                                   th:value="${leader.id}" th:field="*{id}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   placeholder="Enter Title" th:field="*{names}"
                                   th:text="${leader.names}"/> <span class="error text-danger"
                                                                     th:if="${#fields.hasErrors('names')}"
                                                                     th:errors="*{names}"></span>
                            <span class="error text-danger" th:text="${message}"></span>

                        </div>
                        <div class="form-group">
                            <img alt="Image" th:src="@{/showimage/{id}(id=${leader.id})}"
                                 width="250" height="250"/> <input type="file"
                                                                   class="form-control" name="file"
                                                                   th:value="@{/showimage/{id}(id=${leader.id})}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   placeholder="Enter Title" th:field="*{position}"
                                   th:text="${leader.position}"/> <span
                                    class="error text-danger"
                                    th:if="${#fields.hasErrors('position')}"
                                    th:errors="*{position}"></span> <span class="error text-danger"
                                                                          th:text="${message}"></span>

                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"
                                   placeholder="Enter Title" th:field="*{email}"
                                   th:text="${leader.email}"/> <span class="error text-danger"
                                                                     th:if="${#fields.hasErrors('email')}"
                                                                     th:errors="*{email}"></span>
                            <span class="error text-danger" th:text="${message}"></span>

                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save"
                                   class="btn btn-primary py-3 px-5"/>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row block-9" th:if="${dleader}">
                <div class="col-md-7 order-md-last d-flex">
                    <form class="form" th:action="@{/deleteleader}" action=""
                          th:object="${dleader}" enctype="multipart/form-data"
                          method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control"
                                   th:value="${dleader.id}" th:field="*{id}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   placeholder="Enter Title" th:field="*{names}"
                                   th:text="${dleader.names}"/> <span class="error text-danger"
                                                                      th:if="${#fields.hasErrors('names')}"
                                                                      th:errors="*{names}"></span>
                            <span class="error text-danger" th:text="${message}"></span>

                        </div>
                        <div class="form-group">
                            <img alt="Image" th:src="@{/showimage/{id}(id=${dleader.id})}"
                                 width="250" height="250"/> <input type="file"
                                                                   class="form-control" name="file"
                                                                   th:value="@{/showimage/{id}(id=${dleader.id})}"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   placeholder="Enter Title" th:field="*{position}"
                                   th:text="${dleader.position}"/> <span
                                    class="error text-danger"
                                    th:if="${#fields.hasErrors('position')}"
                                    th:errors="*{position}"></span> <span class="error text-danger"
                                                                          th:text="${message}"></span>

                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"
                                   placeholder="Enter Title" th:field="*{email}"
                                   th:text="${dleader.email}"/> <span class="error text-danger"
                                                                      th:if="${#fields.hasErrors('email')}"
                                                                      th:errors="*{email}"></span>
                            <span class="error text-danger" th:text="${message}"></span>

                        </div>

                        <div class="form-group">
                            <input type="submit" value="Delete"
                                   class="btn btn-primary py-3 px-5"/>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <!-- Main Footer -->
    <footer th:replace="common/header :: footer"></footer>
</div>
<div th:replace="common/header :: body-bottom-scripts"></div>

<script>
    $(function () {
        $('#programs').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'pageLength': 2
        })
    })
</script>
<script>
    $(function () {
        $('#leaders').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'pageLength': 4
        })
    })
</script>
</body>
</html>
