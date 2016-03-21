<!--
    This view is for a webpage with the main focus of a single table which data
    may be passed into the key "onTableQuery". The key will be filled with data
    queried from a database. The "oneTableColumns" key is intended to show the
    column names of the table.
-->
    <div id="TableDiv">
        <div id="oneTableDiv">
            <table class="table" id="oneTable">
                    {oneTableColumns}                
                    {oneTableQuery}
            </table>
        </div>
    </div>