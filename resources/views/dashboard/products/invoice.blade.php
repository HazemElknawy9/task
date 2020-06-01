

    <style>

        .delete-btn {
            position: relative;
        }

        .delete {
            display: block;
            color: #000;
            text-decoration: none;
            position: absolute;
            background: #EEEEEE;
            font-weight: bold;
            padding: 0px 3px;
            border: 1px solid;
            top: -6px;
            left: -6px;
            font-family: Verdana;
            font-size: 12px;
        }
    </style>

        <div style="margin-top: 41px;" class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="item-row">
                                <th>الاسم</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr id="hiderow">
                            <td colspan="4">
                                <a id="addRow" href="javascript:;" title="Add a row" class="btn btn-primary">أضف</a>
                            </td>
                        </tr>
                        <!-- Here should be the item row -->
                        <tr class="item-row">
                            <td><input class="form-control item" placeholder="الاسم" name="name[]" type="text"></td>
                            <td><input class="form-control price" placeholder="السعر" name="price[]" type="text"></td>
                            <td><input class="form-control qty" placeholder="الكمية" name="quantity[]" type="text"></td>
                            <td><span class="total">0.00</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>المبلغ الإجمالي</strong></td>
                            <td><span id="subtotal">0.00</span></td>
                        </tr>
                        <tr>
                            <td><strong>اجمالي الكمية: </strong><span id="totalQty" style="color: red; font-weight: bold">0</span> وحدة</td>
                            <td></td>
                            <td class="text-right"><strong>إضافة خصم</strong></td>
                            <td><input class="form-control" id="discount" value="0" type="text"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>الضرائب</strong></td>
                            <td><input class="form-control" id="shipping" value="0" type="text"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>المجموع</strong></td>
                            <td><span id="grandTotal">0</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.invoice.js"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery().invoice({
                addRow : "#addRow",
                delete : ".delete",
                parentClass : ".item-row",

                price : ".price",
                qty : ".qty",
                total : ".total",
                totalQty: "#totalQty",

                subtotal : "#subtotal",
                discount: "#discount",
                shipping : "#shipping",
                grandTotal : "#grandTotal"
            });
        });
    </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


