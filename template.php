<script type="text/javascript" src="ext-4.1.1a-gpl/ext-all.js"></script>
<link
	rel="stylesheet" type="text/css"
	href="ext-4.1.1a-gpl/resources/css/ext-all.css" />
<link
	rel="stylesheet" type="text/css" href="css/steel.css" />

<div id="loading-mask"></div>
<div id="loading">
	<div class="loading-indicator"><img src="img/extanim32.gif"></div>
</div>
<script>
var ii= function(){
	Ext.get('loading').remove();
	   Ext.get('loading-mask').fadeOut({remove:true});
}

Ext.onReady(function(){
    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget='side';
    
    var mainPanel= new Ext.Panel({
        id:'mainpanel',
        frame: true,
        autoScroll: false,
        autoHeight: true,
        border: false,
        width: Ext.getBody().getWidth()-Ext.getScrollBarWidth(true),
        layout: 'fit',
        forceLayout: true,
        title: 'Data Mahasiswa',
        items: formMain,
        renderTo:document.body
    });
    storeData.load();
    Ext.Ajax.on('requestcomplete',ii ,Ext.getBody());
    
});
</script>
