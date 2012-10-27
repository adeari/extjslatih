<html>
<head>

<link rel="stylesheet" type="text/css"
	href="ext-4.1.1a-gpl/resources/css/ext-all.css" />
<style type="text/css">
.my-menu .x-menu-item-link {
	padding-left: 4px;
}
</style>
<script type="text/javascript" src="ext-4.1.1a-gpl/ext-all.js"></script>
<script type="text/javascript">
Ext.require(['*']);

Ext.onReady(function(){

// Menu bug override!
Ext.override(Ext.menu.Menu, {
    // inherit docs
    getFocusEl: function() {
        return this.focusedItem || this.el;
    }
});

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

    new Ext.Viewport({
        layout: 'border',
        items: [{
             region: 'west',
             title: 'Navigation',
             width: 200,
             layout: {
                 type: 'accordion',
                 multi: false,
                 fill: false
             },
             items: menus
        }, {
            region: 'center',
            title: 'Center'
        }]
    });
});
</script>
</head>
<body>
</body>
</html>
