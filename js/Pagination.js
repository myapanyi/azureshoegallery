
        $(document).ready(function () {
            $("div.holder").jPages({
                containerID: "itemContainer",
                perPage: 6,
                animation: "bounceIn",
                callback: function (pages,
        items) {
                    $("#legend1").html("Page " + pages.current + " of " + pages.count);
                    $("#legend2").html("Elements "+items.range.start + " - " + items.range.end + " of " + items.count);
                }
            });

            $("select#Itemsperpage").change(function () {
                /* get new no of items per page */
                var newPerPage = parseInt($(this).val());
                /* destroy jPages and initiate plugin again */
                $("div.holder").jPages("destroy").jPages({
                    containerID: "itemContainer",
                    perPage: newPerPage,
                    animation: "bounceIn",
                    callback: function (pages,
        items) {
                        $("#legend1").html("Page " + pages.current + " of " + pages.count);
                        $("#legend2").html("Elements "+items.range.start + " - " + items.range.end + " of " + items.count);
                    }
                });
            });

        });

