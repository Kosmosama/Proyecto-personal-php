<html>

<head>
    <title>Event Details | SVTickets</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="node_modules/ol/ol.css">
    <script src="src/event-detail.ts" type="module"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SVTickets</a>
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="new-event.html">New event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.html">My profile</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div id="eventContainer" class="row">
            <!-- Event HTML goes here -->
        </div>

        <div class="card mt-4">
            <div class="card-header bg-success text-white" id="address">Restaurant's address</div>
            <div id="map"></div>
        </div>

        <div class="card mt-4 mb-4">
            <div class="card-header bg-danger text-white" id="address">Attendees to the event</div>
            <ul class="list-group" id="userList">
                <!-- Attendees go here. See the template at the bottom of this page -->
            </ul>
        </div>

        <!-- WE WON'T IMPLEMENT COMMENTS IN THE FIRST PROJECT -->
        <!-- <div class="card mt-4 mb-4">
        <div class="card-header bg-info text-white" id="address">User comments</div>
        <ul class="list-group" id="userComments">
        </ul>
      </div> -->
    </div>



    <template id="eventTemplate">
        <div class="col">
            <div class="card shadow">
                <a href=""><img class="card-img-top" src="" /></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="text-decoration-none" href="">title</a>
                    </h4>
                    <p class="card-text">description</p>
                    <div class="row">
                        <!-- Remove this div if event is not mine -->
                        <div class="col">
                            <button class="btn btn-danger delete"><i class="bi bi-trash"></i></button>
                        </div>
                        <div class="col-auto ms-auto">
                            <div class="text-end attend-users"><i class="bi bi-people-fill"></i> 0</div>
                            <div class="text-success text-end m-0 attend-button"><i class="bi bi-hand-thumbs-up-fill"></i> I'm going</div>
                            <!-- Change to bi-hand-thumbs-down-fill if the user is not attending the event  -->
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted row m-0">
                    <div class="col-auto avatar pl-1 pr-1">
                        <a href="">
                            <img src="" class="rounded-circle" />
                        </a>
                    </div>
                    <div class="col">
                        <div class="name"><a href="">creator.name</a></div>
                        <div class="date small text-muted">date</div>
                    </div>
                    <div class="col-auto text-end text-muted">
                        <div class="price small">€0.00</div>
                        <div class="distance small">0 km</div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <template id="attendTemplate">
        <li class="list-group-item">
            <a class="avatar" href="">
                <img class="rounded-circle float-start me-3" style="width: 40px;" src="" alt="" />
            </a>
            <div>
                <div><a class="text-decoration-none name" href="">User name</a></div>
                <div>
                    <small class="email">Email</small>
                </div>
            </div>
        </li>
    </template>

    <template id="commentTemplate">
        <li class="list-group-item">
            <div class="row">
                <div class="col-auto text-center user-info">
                    <a class="avatar" href="">
                        <img class=" rounded-circle" src="" alt="" />
                    </a>
                    <div><small><a class="text-decoration-none name" href="">Pepito Pérez</a></small></div>
                    <div><small class="date">19/11/2021 22:00</small></div>
                </div>
                <div class="col comment">
                    User comment...
                </div>
            </div>
        </li>
    </template>
</body>

</html>