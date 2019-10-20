<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:th="http://www.thymeleaf.org">
<head th:fragment="common-header">
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Alliance</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
        name="viewport"/>
    <link rel="stylesheet" href="static/old/css/bootstrap.min.css}"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="static/old/css/font-awesome.min.css}"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="static/old/css/ionicons.min.css}"/>

    <!-- Theme style -->
    <link rel="stylesheet" href="static/old/css/AdminLTE.min.css}"/>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link rel="stylesheet"
          href="static/old/css/dataTables.bootstrap.min.css}"/>

    <link rel="stylesheet" href="static/old/css/skin-blue.min.css}"/>


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
    <!-- Bootstrap time Picker -->

    <style>
        .emsg {
            color: red;
        }

        .hidden {
            visibility: hidden;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header" th:fragment="main-header"
            sec:authorize="isAuthenticated()">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header" sec:authorize="hasRole('ROLE_ADMIN')">
                    <a href="/admin" class="navbar-brand"><b>H</b>ome</a>
                    <button type="button" class="navbar-toggle collapsed"
                            data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div sec:authorize="isAuthenticated()"
                     class="collapse navbar-collapse pull-right" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Main Footer -->
    <footer class="main-footer" th:fragment="footer"
            sec:authorize="isAuthenticated()">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2018-2019 <a href="#">www.alliance.com</a>.
            </strong> All rights reserved.
        </div>
        <!-- /.container -->
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<div th:fragment="body-bottom-scripts">
    <script th:src="static/old/js/jquery.min.js}"></script>
    <script th:src="static/old/js/bootstrap.min.js}"></script>
    <script th:src="static/old/js/jquery.dataTables.min.js}"></script>
    <script th:src="static/old/js/dataTables.bootstrap.min.js}"></script>
    <script th:src="static/old/js/adminlte.min.js}"></script>
</div>
</body>
</html>