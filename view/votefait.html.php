<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>Soft_rh</title>


</head>


<body class="py-5">

    <!-- ::::::::::::::::::::::::::::::::::::::::::::::: section login :::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->


    <section id="login-page">
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-center  ">
                    <div class="col-lg-12">
                        <div class="col-lg-6 m-0 mx-auto text-center">
                            <a><img class=" img-fluid col-lg-6" src="/media/logo.png" alt="logo"></a>

                            <div class="p-3">
                                <a><img class=" img-fluid" src="/media/soft-rh.png" alt="soft-rh"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php
                    require_once 'header.html.php';
                    ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <p>Votre vote a déjà été enregistré aujourd'hui, merci</p>
                            </div>
                        </div>
                    </div>

                    <?php
                    require_once 'view/footer.html.php';
                    ?>

                    </div>
                </form>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>