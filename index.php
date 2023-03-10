<!DOCTYPE html>
<html lang="en">

<head>
    <title id='Description'>The sample illustrates the Grid's Grouping feature, when Paging is enabled.</title>
    <meta name="description" content="jQuery Grid Data Grouping" />
    <link rel="stylesheet" href="jqwidgets/styles/jqx.base.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />
    <script type="text/javascript" src="jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.grouping.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.pager.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="scripts/demos.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var url = "main_grid.php";
            // prepare the data
            var source = {
                datatype: "json",
                datafields: [{
                        name: 'name_cust',
                        type: 'string'
                    },
                    {
                        name: 'code_cust',
                        type: 'string'
                    },
                    {
                        name: 'addres_cust',
                        type: 'string'
                    },
                    {
                        name: 'contact_cust',
                        type: 'string'
                    }
                ],
                id: "id_cust",
                url: url
            };
            var dataAdapter = new $.jqx.dataAdapter(source);
            // Create jqxGrid
            $("#grid").jqxGrid({
                width: getWidth('Grid'),
                source: dataAdapter,
                groupable: true,
                pageable: true,
                height: 280,
                columns: [{
                        text: 'Nama Customer',
                        datafield: 'name_cust',
                        width: 250
                    },
                    {
                        text: 'Code Customer',
                        datafield: 'code_cust',
                        width: 120
                    },
                    {
                        text: 'Address Customer',
                        datafield: 'addres_cust'
                    },
                    {
                        text: 'Contact Customer',
                        datafield: 'contact_cust'
                    }
                ],
                // groups: ['name_cust']
            });
            $("#expand").jqxButton({
                theme: theme
            });
            $("#collapse").jqxButton({
                theme: theme
            });
            $("#expandall").jqxButton({
                theme: theme
            });
            $("#collapseall").jqxButton({
                theme: theme
            });
            // expand group.
            $("#expand").on('click', function() {
                var groupnum = parseInt($("#groupnum").val());
                if (!isNaN(groupnum)) {
                    $("#grid").jqxGrid('expandgroup', groupnum);
                }
            });
            // collapse group.
            $("#collapse").on('click', function() {
                var groupnum = parseInt($("#groupnum").val());
                if (!isNaN(groupnum)) {
                    $("#grid").jqxGrid('collapsegroup', groupnum);
                }
            });
            // expand all groups.
            $("#expandall").on('click', function() {
                $("#grid").jqxGrid('expandallgroups');
            });
            // collapse all groups.
            $("#collapseall").on('click', function() {
                $("#grid").jqxGrid('collapseallgroups');
            });
            // trigger expand and collapse events.
            $("#grid").on('groupexpand', function(event) {
                var args = event.args;
                $("#expandedgroup").text("Group: " + args.group + ", Level: " + args.level);
            });
            $("#grid").on('groupcollapse', function(event) {
                var args = event.args;
                $("#collapsedgroup").text("Group: " + args.group + ", Level: " + args.level);
            });
        });
    </script>
</head>

<body class='default'>
    <div id="grid">
    </div>
    <div style="margin-top: 30px;">
        <div style="float: left; margin-left: 20px;">
            <input value="Expand Group" type="button" id='expand' />
            <br />
            <input style="margin-top: 10px;" value="Collapse Group" type="button" id='collapse' />
            <br />
            <span style="margin-top: 10px;">Group:</span>
            <input value="1" id="groupnum" style="margin-top: 10px; width: 20px;" type="text" />
        </div>
        <div style="float: left; margin-left: 20px;">
            <input value="Expand All Groups" type="button" id='expandall' />
            <br />
            <input style="margin-top: 10px; margin-bottom: 10px;" value="Collapse All Groups" type="button" id='collapseall' />
            <br />
        </div>
        <div style="float: left; margin-left: 20px;">
            <div style="font-weight: bold;">
                <span>Event Log:</span>
            </div>
            <div style="margin-top: 10px;">
                <span>Expanded Group:</span> <span id="expandedgroup"></span>
            </div>
            <div style="margin-top: 10px;">
                <span>Collapsed Group:</span> <span id="collapsedgroup"></span>
            </div>
        </div>
    </div>
</body>

</html>