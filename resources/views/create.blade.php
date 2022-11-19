<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .container {
            padding-top: 4em;
        }
        .label-holder {
            width: 100px;
            padding-right: 10px;
            text-align: right;
        }
    </style>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div class="container">
        <div class="row">
            <form action="" method="post">
                @csrf
                <div class="parameters">
                    <label for="param-max">Site</label>
                    <input class="parameter-input hasDatepicker date-type" id="param-site" type="text" name="site" value="stackoverflow" readonly>
                    <input type="button" onclick="editSite()" value="Edit">

                    <table class="table">
                        <tbody>
                        <tr>
                            <td >
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder">
                                            <label for="param-page">page</label>
                                        </td>
                                        <td>
                                            <input class="parameter-input number-type" id="param-page" type="text"
                                                   name="page">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder">
                                            <label for="param-pagesize">pagesize</label>
                                        </td>
                                        <td>
                                            <input class="parameter-input number-type" id="param-pagesize"
                                                   type="text" name="pageSize">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder">
                                            <label for="param-fromdate">fromdate</label>
                                        </td>
                                        <td><input class="parameter-input hasDatepicker date-type"
                                                   id="param-fromdate" type="date" name="fromDate"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-todate">todate</label></td>
                                        <td><input class="parameter-input hasDatepicker date-type" id="param-todate"
                                                   type="date" name="toDate"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-order">order</label></td>
                                        <td><select name="order" id="param-order" class="parameter-select">
                                                <option>desc</option>
                                                <option>asc</option>
                                            </select></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-min">min</label></td>
                                        <td><input class="parameter-input hasDatepicker date-type" id="param-min"
                                                   type="date" name="min"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-max">max</label></td>
                                        <td><input class="parameter-input hasDatepicker date-type" id="param-max"
                                                   type="date" name="max"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-sort">sort</label></td>
                                        <td><select onchange="doSomething()" name="sort" id="param-sort" class="parameter-select">
                                                <option>activity</option>
                                                <option>votes</option>
                                                <option>creation</option>
                                                <option>relevance</option>
                                            </select></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-tagged">tagged</label></td>
                                        <td><input class="parameter-input list-type" id="param-tagged" type="text"
                                                   name="tagged"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-nottagged">nottagged</label></td>
                                        <td><input class="parameter-input list-type" id="param-nottagged"
                                                   type="text" name="notTagged"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <table class="parameter">
                                    <tbody>
                                    <tr>
                                        <td class="label-holder"><label for="param-intitle">intitle</label></td>
                                        <td><input class="parameter-input string-type" id="param-intitle"
                                                   type="text" name="inTitle"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <button class="btn btn-primary" type="submit"> Run </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function doSomething() {
        var e = document.getElementById("param-sort");
        var text = e.options[e.selectedIndex].text;
        switch (text){
            case 'votes':
                document.getElementById("param-min").disabled = false;
                document.getElementById("param-max").disabled = false;
                document.getElementById("param-max").type = "number";
                document.getElementById("param-min").type = "number";
                break;
            case 'relevance':
                document.getElementById("param-min").disabled = true;
                document.getElementById("param-max").disabled = true;
                document.getElementById("param-max").type = "text";
                document.getElementById("param-min").type = "text";
                break;
            default:
                document.getElementById("param-min").disabled = false;
                document.getElementById("param-max").disabled = false;
                document.getElementById("param-max").type = "date";
                document.getElementById("param-min").type = "date";
                break;
        }
    }
    function editSite(){
        document.getElementById("param-site").readOnly = false;
    }
</script>
</html>
