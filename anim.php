<html>
<head>
<title>Hello World Window</title>

<link
	rel="stylesheet" type="text/css" href="css/steel.css" />
<div id="loading-mask"></div>
<div id="loading">
	<div class="loading-indicator"><img src="img/gear_ani.gif"></div>
</div>
<script type="text/javascript" src="ext-4.1.1a-gpl/ext-all.js"></script>
<link
	rel="stylesheet" type="text/css"
	href="ext-4.1.1a-gpl/resources/css/ext-all.css" />



<script type="text/javascript" src="ext-4.1.1a-gpl/docs/output/Ext.Base.js"></script>


</head>
<body>
<script type="text/javascript">

Ext.onReady(function() {

var myButton = new Ext.Button({
  text    : 'hide me',
  handler : function() {
    myPanel.el.switchOff({
      callback : function() {
        myPanel.el.slideIn.defer(500, myPanel.el, []);
      }
    });
  } 
});

myPanel = new Ext.Panel({
  width    : 200,
  height   : 100,
  title    : 'Title me',
  frame    : true,
  renderTo : Ext.getBody(), 
  items    :  myButton 
});

});
</script> 
<div id='div1'>asdf</div>
</body>
</html>