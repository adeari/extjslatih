<html class="x-border-box x-quirks x-viewport">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Super Menu</title>
<link rel="stylesheet" type="text/css" href="css/steel.css" />
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
</head>
<body>
	<div id="immmu" class="center">
			<img src="img/loaduu.gif">
			</div>
</body>
<link rel="stylesheet" type="text/css"
	href="ext-4.1.1a-gpl/resources/css/ext-all.css">
<script type="text/javascript" src="ext-4.1.1a-gpl/ext-all.js"></script>
<script type="text/javascript">

    Ext.onReady(function() {
        Ext.QuickTips.init();


        var menus = [];
    for (var menu = 0; menu < 4; menu++) {
        var menuConfig = {
            title: 'Menu ' + (menu + 1),
            xtype: 'menu',
            cls: 'my-menu',
            showSeparator: false,
            floating: false,
            hideHeader: false,
            items: [],
            collapsed: menu > 0
        };
        for (var menuItem = 0; menuItem < 10; menuItem++) {
            menuConfig.items.push({text: 'Menu ' + (menu + 1) + ', item ' + (menuItem + 1)});
        }
        menus.push(menuConfig);
    }

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
                layout: {
                 type: 'accordion',
                 multi: false,
                 fill: false
             	},
	             items: menus,
            },
            Ext.create('Ext.tab.Panel', {
                region: 'center',
                deferredRender: false,
                activeTab: 0
            })]
        });
        Ext.get('immmu').remove();
    });
    </script>
</html>
