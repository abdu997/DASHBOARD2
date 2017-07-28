<html>
<script src="js/jquery.js"></script>
<script>
    $(document).ready((function) {
        $("#save").click(function() {
            var name = $("#name").val();
            var comment = $("#comment").val();

            $.ajax({
                url: "php/server.php",
                type: "post",
                async: false,
                data: {
                    "done": 1,
                    "username": name,
                    "comment": comment
                },
                success: function(data) {

                }

            });

        });

    });
</script>
<div>
    <form>
        name:<input type="text" id="name"><br>
        comment:<input type="text" id="comment">
        <br>
        <input type="submit" value="post" id="save">
    </form>
</div>

</html>