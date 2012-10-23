<script type="text/javascript" src="ext-4.1.1a-gpl/ext-all.js"></script>
<link
	rel="stylesheet" type="text/css"
	href="ext-4.1.1a-gpl/resources/css/ext-all.css" />
<link
	rel="stylesheet" type="text/css" href="css/steel.css" />

<div id="loading-mask"></div>
<div id="loading">
	<div class="loading-indicator"><img src="img/gear_ani.gif"></div>
</div>
<script>
var xg = Ext.grid;
var storepage = new Ext.data.SimpleStore({
    fields: ['text', 'value'],
    data: [['10', 10], ['20', 20], ['30', 30], ['50', 50], ['100', 100]]
});
Ext.define('modelColumn', {
    extend: 'Ext.data.Model',
    fields: [{
        name: 'nama'
    },{
        name: 'alamat'
    },{
        name: 'id',
        type:  'integer'
    }]
});


var storeData = Ext.create('Ext.data.JsonStore', {
        model: 'modelColumn',
        pageSize:10,
        proxy: {
            type: 'ajax',
            url: 'data.php',
            reader: {
                type: 'json',
                totalProperty: 'totalData',
                root: 'data'
            }
        },
        sorters: [{
            property: 'id',
            direction: 'ASC'
        }],
        listeners:{
            load:function(a){
                if (a.getCount()<1&&a.currentPage>1) {
                    myBarData.movePrevious();
                }
            }
        }
    });
var pageOption=new Ext.form.ComboBox({
    store: storepage,
    displayField:'text',
    valueField:'value',
    value:10,
    typeAhead: true,
    mode: 'local',
    triggerAction: 'all',
    emptyText:'',
    selectOnFocus:true,
    width:50,
    listeners:{
        select:function(a){
            currentPosition=(storeData.currentPage-1)*a.getValue();
            storeData.load({
                params:{
                    start:currentPosition, 
                    limit:a.getValue()
                }
            });
            storeData.pageSize=a.getValue();
        }
    }
});

var myBarData = new Ext.PagingToolbar({
    id:'myBarData',
    store: storeData,
    displayInfo: true,
    displayMsg: 'Displaying Data {0} - {1} of {2}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
    emptyMsg: "No data to display",
    items:['-',pageOption,' records']
});

function ShowEditform(deData) {
    formData.setVisible(true);
    formData.setTitle('Edit Data '+deData.data.nama);
    Ext.getCmp('id').setValue(deData.data.id);
    Ext.getCmp('nama').setValue(deData.data.nama);
    Ext.getCmp('alamat').setValue(deData.data.alamat);
}

function delData(deData){
    Ext.MessageBox.show({
        title: 'Hapus Data',
        icon:Ext.MessageBox.QUESTION,
        msg: 'Hapus data '+deData.data.nama+' ?',
        buttons: Ext.MessageBox.YESNO,
        fn:function(btn){
            if(btn=='yes') {
            Ext.Ajax.request({
                url: 'del.php',
                params: {
                    id: deData.data.id
                },
                success: function(response){
                    currentPosition=(storeData.currentPage-1)*pageOption.getValue();
                            storeData.load({
                                params:{
                                    start:currentPosition,
                                    limit:pageOption.getValue()
                                }
                    });
                }
              });
        }}
    });
}

var gridData = new xg.GridPanel({
    id:'gridData',
    store: storeData,
    columns: [
    {
        text: 'id',
        dataIndex: 'id',
        width : 50,
        align:'right'
    },{
        text: 'nama',
        dataIndex: 'nama',
        width : 200
    },{
        text: 'alamat',
        dataIndex: 'alamat',
        width : 400
    }],
    viewConfig: {
        forceFit: true
    },
    loadMask: {
        msg: 'loading data ...'
    },
    layout: 'fit',
    autoScroll:true,
    border:true,
    frame: false,
    title: 'Your CC List',
    bbar:myBarData,
    listeners : {
        itemdblclick: function(dv, deData, item, index, e) {
             ShowEditform(deData);
        },
        itemcontextmenu:  function(dv, deData, item, index, e){
            e.stopEvent();
            var gridMenu = Ext.create('Ext.menu.Menu', {
                width: 100,
                            items: [{                                
                                text: 'Edit',
                                iconCls: 'editBtn',
                                handler:function(){
                                    ShowEditform(deData);
                                }
                           },{        
                                text: 'Delete',
                                iconCls: 'delBtn',
                                handler:function(){
                                    delData(deData);
                                }   
                           }]
                        });
            gridMenu.showAt(e.getXY());
        },
        render: function(grid,deData, item, index, e) {
             grid.el.on('keyup',
                     function(e) {
                        if (e.getKey()==46) {
                            var recid = gridData.getSelectionModel().getCurrentPosition();
                            var deData=gridData.getStore().getAt(recid.row);
                            delData(deData);
                        }
                     }, this);
        }
    }
});

var addToolbar= new Ext.Toolbar({
    items:[{
        text:'Add',
        iconCls:'addDataIcon',
        tooltip:'Add data',
        handler:function(){
            formData.setVisible(true);
            formData.setTitle('Add Data');
            Ext.getCmp('id').reset();
            Ext.getCmp('nama').reset();
            Ext.getCmp('alamat').reset();
        }
    }]
});

var formData=new Ext.FormPanel({
    frame: true,
    labelWidth: 30,
    width:300,
    hidden:true,
    waitMsgTarget: true,
    items: [{
        xtype:'textfield',
        fieldLabel: 'Nama ',
        name: 'nama',
        id: 'nama',
        maxLength:40
    },{
        xtype:'textfield',
        fieldLabel: 'Alamat ',
        name: 'alamat',
        id: 'alamat'
    },{
        xtype:'hidden',
        name:'id',
        id:'id'
    }],
    buttonAlign:'center',
    buttons:[{
        type:'submit',
        text:'Save',
        iconCls:'saveDataIcon',
        handler:function(){
            formData.getForm().submit({
                        url:'addData.php', 
                        waitMsg:'Saving Data',
                        success: function(f, a){
                            var pesannya=a.result.msg;
                            
                            Ext.MessageBox.show({
                                    title: 'Success',
                                    icon:Ext.MessageBox.INFO,
                                    msg: pesannya,
                                    fn:function(){
                                        currentPosition=(storeData.currentPage-1)*pageOption.getValue();
                                        if (currentPosition<0) currentPosition=1;
                                            storeData.load({
                                                params:{
                                                    start:currentPosition, 
                                                    limit:pageOption.getValue()
                                                }
                                            });
                                    },
                                    buttons: Ext.MessageBox.OK
                                }); 
                        }
            });
        }
    },{
        text:'Reset',
        iconCls: 'resetBtn',
        handler:function(){
            Ext.getCmp('nama').reset();
            Ext.getCmp('alamat').reset();
        }
    },{
        text:'Close',
        iconCls:'cancelBtn',
        handler:function(){
            formData.setVisible(false);
        }
    }]
});


var formMain = new Ext.Panel({
    border:true,
    header: false,
    footer: false,
    frame: true,
    items:[gridData,addToolbar,formData]
});

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
