<html ng-app="shopApp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/shop.css" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Shopping List</title>

</head>

<body ng-controller="shopController">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-sm-12">
                <section class="items">

                    <header class="items-header">
                        <div class="row">
                            <div class="col-sm-9 col-xs-12">

                                <form class="form-inline" name="shopList">
                                    <div class="form-actions">
                                        <div class="input-group">
                                            <input type="text" class="form-control" ng-model="itemInput" placeholder="Add New Item" autofocus required />
                                            <div class="input-group-btn">
                                                <button class="btn btn-info" type="submit" ng-click="addItem(itemInput); itemInput = null" ng-disabled="shopList.$invalid">
                                                    <i class="fa fa-plus"></i>&nbsp;Add Task
                                                </button>
                                                <button class="btn btn-default" ng-click="clearItem()" style="margin-left: 20px">
                                                Clear Completed Tasks
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="col-sm-3 hidden-xs">
                                <input type="text" ng-model="filterItem" class="form-control" placeholder="Filter Tasks" />
                            </div>
                        </div>
                    </header>

                    <fieldset class="items-list">
                        <label class="items-list-item" ng-repeat="item in items | filter : filterItem">
                            <input type="checkbox" value="{{item.STATUS}}" ng-checked="item.STATUS==2" ng-click="changeStatus(item.ID,item.STATUS,item.ITEM)" class="items-list-cb" />
                            <span class="items-list-mark"></span>
                            <span class="items-list-desc" ng-class="{strike:item.STATUS==2}">{{item.ITEM}} <span class="date">[{{item.CREATED_AT | date:"MMM d"}}]</span></span>
                            <a ng-click="deleteItem(item.ID)" class="pull-right red"><i class="fa fa-minus-circle"></i></a>
                        </label>
                    </fieldset>

                </section>
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script type="text/javascript" src="app/app.js"></script>
</body>

</html>