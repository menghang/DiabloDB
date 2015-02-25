<?php
if (isset($fields)):
?>
<script>
    $(function() {
        var dialog, form,
                <?php
                foreach ($fields as $field => $options)
                {
                    echo $field . ' = $("#' . $field . '"),'; // member = $("#member"),
                }
                ?>
                allFields = $( [] )
                        <?php
                        foreach ($fields as $field => $options)
                        {
                            echo '.add( '.$field.' )'; // .add( member )
                        }
                        ?>,
                tips = $( ".validateTips" );

        function updateTips( t ) {
            tips
                .text( t )
                .addClass( "ui-state-highlight" );
            setTimeout(function() {
                tips.removeClass( "ui-state-highlight", 1500 );
            }, 500 );
        }

        function checkLength( o, n, min, max ) {
            if ( o.val().length > max || o.val().length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( "Length of " + n + " must be between " +
                min + " and " + max + "." );
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } else {
                return true;
            }
        }

        function addItem() {
            var valid = true;
            allFields.removeClass( "ui-state-error" );

            <?php
            foreach ($fields as $field => $options)
            {
                echo "valid = valid && checkLength( {$field}, \"{$field}\", {$options['min']}, {$options['max']} );";
            }
            ?>

            if ( valid ) {
                <?php
                    foreach ($fields as $field => $options)
                    {
                        echo "var post_{$field} = {$field}.val();";
                    }
                ?>

                var data = {
                    _token: "{{ csrf_token() }}",
                    <?php
                        foreach ($fields as $field => $options)
                        {
                            echo "\"{$field}\": post_{$field},\r\n";
                        }
                    ?>
                };

                /* POST */
                $.post("{{ $endpoint }}", data, function(data) {
                    <?php if (isset($success)): ?>
                    <?php echo $success; ?>
                    <?php endif; ?>
                });
            }
            return valid;
        }

        dialog = $( "#<?php echo $container ?>" ).dialog({
            autoOpen: false,
            height: 300,
            width: 350,
            modal: true,
            buttons: {
                "Create": addItem,
                Cancel: function() {
                    dialog.dialog( "close" );
                }
            },
            close: function() {
                form[ 0 ].reset();
                allFields.removeClass( "ui-state-error" );
            }
        });

        form = dialog.find( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            addRaid();
        });

        $( "#<?php echo $button ?>" ).button().on( "click", function() {
            dialog.dialog( "open" );
        });
    });
</script>
<?php endif; ?>