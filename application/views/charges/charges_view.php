<section>
    <h4>COSTS</h4>
    <form method="post" >
        <div class="row uniform">
            <div class="6u 12u$(xsmall)">
                <input type="text" name="add_charge_name" id="add_charge_name" value="" placeholder="Name" required autofocus />
            </div>
            <div class="4u 12u$(xsmall)">
                <input type="text" pattern="\d+(,\d{2})?" name="add_charge_coast" id="add_charge_coast" value="" placeholder="Coast" required />
            </div>
            <div class="2u$ 12u$(xsmall)">
                <div class="select-wrapper">
                    <select name="add_charge_currency" id="add_charge_currency" onchange="setCurrency();">

                        <?php

                        foreach (array('RUB', 'USD', 'EUR') as $currency) {

                            if ($currency == $data['currency']) {

                                echo "<option value=".$data['currency']." selected >".$data['currency']."</option>";

                            } else {

                                echo "<option value=".$currency.">".$currency."</option>";

                            }

                        }

                        ?>


                    </select>
                </div>
            </div>
            <div class="12u$">
                <div class="select-wrapper">
                    <select name="add_charge_category" id="add_charge_category" required >

                        <option value="">- Category -</option>

                        <?php

                            foreach ($data['charges_category_list'] as $category) {

                                echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';

                            }

                        ?>
<!--
                        <option value="1">Transport</option>
                        <option value="2">Food</option>
                        <option value="3">Fees</option>
                        <option value="4">Other</option>
-->
                    </select>
                </div>
            </div>
            <!--
                                        <div class="4u 12u$(small)">
                                            <input type="radio" id="demo-priority-low" name="demo-priority" checked>
                                            <label for="demo-priority-low">Low</label>
                                        </div>
                                        <div class="4u 12u$(small)">
                                            <input type="radio" id="demo-priority-normal" name="demo-priority">
                                            <label for="demo-priority-normal">Normal</label>
                                        </div>
                                        <div class="4u$ 12u$(small)">
                                            <input type="radio" id="demo-priority-high" name="demo-priority">
                                            <label for="demo-priority-high">High</label>
                                        </div>
                                        <div class="6u 12u$(small)">
                                            <input type="checkbox" id="demo-copy" name="demo-copy">
                                            <label for="demo-copy">Email me a copy</label>
                                        </div>
                                        <div class="6u$ 12u$(small)">
                                            <input type="checkbox" id="demo-human" name="demo-human" checked>
                                            <label for="demo-human">Not a robot</label>
                                        </div>
                                        <div class="12u$">
                                            <textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
                                        </div>
            -->
            <div class="12u$">
                <ul class="actions">
                    <li><input type="button" value="Add new" class="special" onclick="addNewCharge()" /></li>
                    <li><input type="reset" value="Reset" /></li>
                </ul>
            </div>
        </div>
    </form>
</section>

<br/>

<section>

    <h5>Category summary table</h5>

    <div class="table-wrapper">
        <table class="alt" >
            <thead>
            <tr>
                <th>Category</th>
                <th>Sum</th>
                <th>Currency</th>
                <th>Payments count</th>
                <th>Last payment</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($data['category_summary_table'] as $d) {

                echo '<tr><td>'.$d['category'].'</td><td>'.$d['sum'].'</td><td>'.$data['currency'].'</td><td>'.$d['payments_count'].'</td><td>'.$d['last_payment'].'</td></tr>';

            }

            ?>
            </tbody>
            <tfoot>
            <tr>

                <td colspan="2"><b>Total sum:</b></td>
                <td><b>
                        <?php echo $data['total_sum'];  ?>
                    </b>
                </td>
                <td><b><?php echo $data['currency']; ?></b></td>
            </tr>
            </tfoot>
        </table>
    </div>

</section>
