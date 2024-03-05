<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="https://cdn.tailwindcss.com"></script>
{{--    @vite(['resources/js/app.js'])--}}
</head>
<style>
    body{
        box-sizing: border-box;
    }

    .search-input{
        transition: all 200ms;
    }

    .open{
        width: 30vw;
    }

    .closed{
        width: 0;
        display: none;
    }

</style>
<body>
<nav class="navbar navbar-light bg-light d-flex align-items-center p-3 pe-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
            Guicher
        </a>

        <div class="d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center gap-3">

                <input placeholder="Search..." class="border border-0 search-input p-1 rounded closed">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item active" href="profile">Account</a></li>
                        <li><a class="dropdown-item" href="purchases">Purchases</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./controller/logout.php">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<form action="" method="post" class="d-flex  container mt-5 shadow-sm p-3 mb-5 bg-light gap-3 rounded">
    @csrf
    <input class="form-control me-2 m-1 start-date" type="date" value='2024-03-03' min="2024-03-03" name="startDate" placeholder="From Date" aria-label="Search" id="fromDate">
    <p class="align-self-center m-0 w-50">End At</p>
    <input class="form-control me-2 m-1 end-date" type="date" name="endDate" placeholder="From Date" aria-label="Search" id="fromDate" disabled>
    <div>

    </div>
    <select class="form-select form-select-sm m-1" aria-label=".
                form-select-sm example" name="category">
        <option value="all" selected>All Categories</option>
        <option value=Music>Music</option><option value=Theatre>Theatre</option><option value=Comedy>Comedy</option>    </select>

    <input class="btn btn-warning p-1 m-1" type="submit" value="filter" name="filter" onclick="this.form.submit()">
    <select class="form-select form-select-sm m-1 active-select" aria-label="form-select-sm example">
        <option value="all" selected>All</option>
        <option value="open">Only Available</option>
        <option value="close">Guichet fermé</option>
    </select>

</form>

<section class="w-100 d-flex flex-wrap gap-4 ps-4 pe-4 mb-5" style="height: 100%">
    @foreach($data as $event)
            <div class="card h-min" style="width: 18rem;">
                <img src="https://pbs.twimg.com/profile_images/1701878932176351232/AlNU3WTK_400x400.jpg" img='{{$event->IMAGE}}' class="card-img-top" alt="..."/>
                <p  class="badge text-bg-primary text-decoration-none m-1 align-self-start category-label">{{$event->CATEGORIE}}</p>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{$event->TITRE}}</h5>
                    <p class="card-text d-flex gap-2 align-items-center"><i class="fa-regular fa-clock"></i>{{$event->DATE}}</p>
                    @if(!$event->DISPONIBLE == 0) <a href="event?id={{$event->ID_VERSION}}" class="btn btn-warning align-self-end buy-btn">J’achète</a>
                    @else <a href="event?id={{$event->ID_VERSION}}" class="btn btn-dark align-self-end buy-btn">Guichet fermé</a>@endif
                </div>
            </div>
    @endforeach
</section>

</body>
</html>





