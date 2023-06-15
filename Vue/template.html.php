<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Public/style.css">
    <style>
        body {
            background-color: var(--grey);
        }
        .contain {
            width: 270px;
            height: 700px;
            background-color: white;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            bottom: 12%;
            left: -12%;
            box-shadow: 3px 6px 15px -1px rgba(0,0,0,0.75);
            transition: transform 0.4s;
            z-index: 999;
        }
        .Menu {
            height: 85%;
            width: 80%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .side-menu {
            font-size: 0.9em;
            font-weight: bold;
            display: flex;
            justify-content: space-around;
            flex-direction: column;
        }
        .top {
            height: 50%;
        }
        .top1 {
            height: 13%;
        }
        li:hover {
            transform: scale(1.2);
        }
        .icc, .iccc {
            position: absolute;
            left: 2%;
            top: 4%;
            font-size: 4em;
            color: blue;
        }
        .none {
            transform: translateX(100%);
        }
		.side-menu a {
            text-decoration: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <i class='bx bx-log-out-circle iccc'></i>
    <div class="contain none">
        <div class="Menu">
            <ul class="side-menu top">
                <li class="active">
                    <a href="http://localhost:8080/DIscipline/Gestion" class="hov">
                        <i class='bx bxs-dashboard'></i>
                        <span class="text">Gestion Discipline</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost:8080/niveau/lister" class="hov">
                        <i class='bx bxs-user-detail'></i>
                        <span class="text">Gestion Niveau</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost:8080/Annee/lister" class="hov">
                        <i class='bx bxs-graduation'></i>
                        <span class="text">Gestion Annee Scolaire</span>
                    </a>
                </li>
                <li>
                    <a href="classe.html.php" class="hov">
                        <i class='bx bxs-school'></i>
                        <span class="text">Gestion Des Classes</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost:8080/niveau/lister" class="hov">
                        <i class='bx bxs-left-top-arrow-circle'></i>
                        <span class="text">Gestion Des Niveaux</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="hov">
                        <i class='bx bxs-group'></i>
                        <span class="text">Mon Team</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu top1">
                <li>
                    <a href="#" class="hov">
                        <i class='bx bxs-cog'></i>
                        <span class="text">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="logout hov">
                        <i class='bx bxs-log-out'></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <script src="http://localhost:8080/script.js"></script>
    </div>
    <script src='https://unpkg.com/boxicons@2.0.9/js/boxicons.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MOeDm72n6JF0X2X8ot+5I9EZTSVRUFgdyd+kzsmmUjXPsNvnB68jMyiJSM+VBqch" crossorigin="anonymous"></script>
</body>
</html>
