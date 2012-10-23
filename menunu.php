<html class="x-border-box x-quirks x-viewport">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Super Menu</title>
<link rel="stylesheet" type="text/css"
	href="ext-4.1.1a-gpl/resources/css/ext-all.css">
	<link
	rel="stylesheet" type="text/css" href="css/steel.css" />
<style type="text/css">
p {
	margin: 5px;
}

.settings {
	background-image:
		url(ext-4.1.1a-gpl/examples/shared/icons/fam/folder_wrench.png);
}

.nav {
	background-image:
		url(ext-4.1.1a-gpl/examples/shared/icons/fam/folder_go.png);
}

.info {
	background-image:
		url(ext-4.1.1a-gpl/examples/shared/icons/fam/information.png);
}
</style>
<script type="text/javascript" src="ext-4.1.1a-gpl/ext-all.js"></script>
<script type="text/javascript">
    Ext.require(['*']);
    
    Ext.onReady(function() {

        Ext.QuickTips.init();

        // NOTE: This is an example showing simple state management. During development,
        // it is generally best to disable state management as dynamically-generated ids
        // can change across page loads, leading to unpredictable results.  The developer
        // should ensure that stable state ids are set for stateful components in real apps.
        Ext.state.Manager.setProvider(Ext.create('Ext.state.CookieProvider'));

        var viewport = Ext.create('Ext.Viewport', {
            id: 'border-example',
            layout: 'border',
            items: [
            Ext.create('Ext.Component', {
                region: 'north',
                height: 32,
                margins: '0 5 0 0',
            }), {
                region: 'south',
                split: true,
                height: 100,
                minSize: 100,
                maxSize: 200,
                collapsible: true,
                margins: '0 0 0 0'
            }, {
                region: 'east',
                animCollapse: true,
                collapsible: true,
                split: true,
                width: 225,
                minSize: 175,
                maxSize: 400,
                margins: '0 5 0 0',
                activeTab: 1
            }, {
                region: 'west',
                stateId: 'navigation-panel',
                id: 'west-panel',
                split: true,
                width: 200,
                minWidth: 175,
                maxWidth: 400,
                collapsible: true,
                animCollapse: true,
                margins: '0 0 0 5',
                layout: 'accordion'
            },
            Ext.create('Ext.tab.Panel', {
                region: 'center',
                deferredRender: false,
                activeTab: 0
            })]
        });
        Ext.get('loading').remove();
    	   Ext.get('loading-mask').fadeOut({remove:true});
    });
    </script>
</head>
<body>
<div id="loading-mask"></div>
<div id="loading">
	<div class="loading-indicator"><img src="img/gear_ani.gif"></div>
</div>
</body>
</html>
