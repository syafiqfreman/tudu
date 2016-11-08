
<!doctype html>
<html ng-app="todoApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>To Do Today!</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
		angular.module('todoApp', [])
		.controller('TodoListController', function() {
			var todoList = this;
			todoList.todos = [
			{text:'Finish Variable PHP Learning @W3CSchool', done:true},
			{text:'Provide Documentation to Aliah Husband', done:false}];

			todoList.addTodo = function() {
				todoList.todos.push({text:todoList.todoText, done:false});
				todoList.todoText = '';
			};

			todoList.remaining = function() {
				var count = 0;
				angular.forEach(todoList.todos, function(todo) {
					count += todo.done ? 0 : 1;
				});
				return count;
			};

			todoList.archive = function() {
				var oldTodos = todoList.todos;
				todoList.todos = [];
				angular.forEach(oldTodos, function(todo) {
					if (!todo.done) todoList.todos.push(todo);
				});
			};
		});
	</script>
	<style type="text/css">
		.done-true {
			text-decoration: line-through;
			color: grey;
		}
	</style>
</head>
<body>
	<header>
		<h2 class="text-center">TU<strong>DU</strong></h2>
		<p class="text-center">Your Stupid Micro Todo List Today</p>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Today Task</strong>
					</div>
					<div class="panel-body">
						<div ng-controller="TodoListController as todoList">
							<span>{{todoList.remaining()}} of {{todoList.todos.length}} remaining</span>
							[ <a href="" ng-click="todoList.archive()">archive</a> ]
							<ul class="unstyled">
								<li ng-repeat="todo in todoList.todos">
									<label class="checkbox">
										<input type="checkbox" ng-model="todo.done">
										<span class="done-{{todo.done}}">{{todo.text}}</span>
									</label>
								</li>
							</ul>
							<form ng-submit="todoList.addTodo()">
								<input class="form-control" type="text" ng-model="todoList.todoText"  size="30"
								placeholder="add new todo here" required="true">
								<br>
								<input class="btn btn-primary form-control" type="submit" value="+ Add">
							</form>
						</div><!-- / ToDoListController -->
					</div><!-- / psnel-body -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						Today you are crazy. To many thing to do. To many datelines. Here is a simple apps. Run. Do not refresh. Refresh mean tomorrow.
					</div>
				</div>

			</div>
		</div><!-- End row -->
		<footer>
			<p class="text-center text-muted">Powered by Angular JS. Made by Syafiq Freman</p>
		</footer>


	</div>
</body>
</html>
