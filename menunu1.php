<html class="x-border-box x-quirks x-viewport">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>Super Menu</title>

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

<div id="immmu">
<table width="100%" height="100%">
<tr><td align="center">
			<img src="img/loaduu.gif">
</td></tr>
</table>
</div>

</body>
<link rel="stylesheet" type="text/css"
	href="ext-4.1.1a-gpl/resources/css/ext-all.css">
<script type="text/javascript" src="ext-4.1.1a-gpl/ext-all.js"></script>
<link rel="stylesheet" type="text/css" href="css/steel.css" />
<script type="text/javascript">

    Ext.onReady(function() {
        Ext.QuickTips.init();

		
var menus = [];

var storeData = Ext.create('Ext.data.TreeStore', {
        proxy: {
            type: 'ajax',
            url: 'treeStore.php',
            reader: {
                type: 'json',
                root: 'nodes',
            }
        }
    });

        var menus1 =Ext.create('Ext.tree.Panel', {
    title: 'Simple Tree',
    width: 150,
    height: 150,
	rootVisible: false,
	lines: false,
	containerScroll: true,
	useArrows: true,
	store: storeData,	
	singleExpand:true
});
menus.push(menus1);
var menus2 = Ext.create('Ext.tree.Panel', {
    title: 'Simple Tree',
    width: 150,
    height: 150,
	rootVisible: false,
	lines: false,
    root: {
		children: [
            { text: "Menu Option 1",id:'iii', leaf: true },
			{ text: "Menu Option 1", leaf: true }
			]
    }
});
        menus.push(menus2);
		
		var menus3 = Ext.create('Ext.tree.Panel', {
    title: 'Simple Tree',
    width: 150,
    height: 150,
	rootVisible: false,
	lines: false,
    root: {
		children: [
            { text: "Menu Option 1", leaf: true },
			{ text: "Menu Option 1", leaf: true }
			]
    }
});
        menus.push(menus3);

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
