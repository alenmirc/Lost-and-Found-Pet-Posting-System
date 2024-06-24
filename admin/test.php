<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333;
  background-color: #fff;
}

.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 200px;
  height: 100%;
  background-color: #222;
  overflow-y: auto;
}

.sidebar .nav {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar .nav li {
  display: block;
  padding: 10px 15px;
  border-bottom: 1px solid #333;
}

.sidebar .nav li a {
  color: #fff;
  text-decoration: none;
}

.sidebar .nav li a:hover {
  color: #ddd;
  background-color: #444;
}

.sidebar .nav li.active a {
  color: #fff;
  background-color: #444;
}

.content {
  margin-left: 200px;
}
</style>
<body>
<div class="sidebar">
  <ul class="nav">
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</div>
​
<div class="content">
  <h1>This is the content area</h1