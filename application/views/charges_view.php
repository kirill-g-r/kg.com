<section>
    <h4>CHARGES</h4>
    <form method="post" action="#" onsubmit="addNewCharge()" ">
        <div class="row uniform">
            <div class="6u 12u$(xsmall)">
                <input type="text" name="add_charge_name" id="add_charge_name" value="" placeholder="Name" required autofocus />
            </div>
            <div class="4u 12u$(xsmall)">
                <input type="text" name="add_charge_coast" id="add_charge_coast" value="" placeholder="Coast" required />
            </div>
            <div class="2u$ 12u$(xsmall)">
                <div class="select-wrapper">
                    <select name="add_charge_currency" id="add_charge_currency">
                        <option value="RUB" selected >RUB</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>
            </div>
            <div class="12u$">
                <div class="select-wrapper">
                    <select name="add_charge_category" id="add_charge_category" required >
                        <option value="">- Category -</option>
                        <option value="Transport">Transport</option>
                        <option value="Food">Food</option>
                        <option value="Fees">Fees</option>
                        <option value="Other">Other</option>
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
                    <li><input type="submit" value="Add new" class="special" /></li>
                    <li><input type="reset" value="Reset" /></li>
                </ul>
            </div>
        </div>
    </form>
</section>

<br/>

<section>
    <h5>summary table</h5>

    <div class="table-wrapper">
        <table class="alt" >
            <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Coast</th>
                <th>Currency</th>
                <th>Timestamp</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($data as $d) {

                echo '<tr><td>'.$d['category'].'</td><td>'.$d['name'].'</td><td>'.$d['coast'].'</td><td>'.$d['currency'].'</td><td>'.$d['time'].'</td></tr>';

            }

            ?>
            </tbody>
            <tfoot>
            <tr>

                <td colspan="2"><b>Total sum:</b></td>
                <td><b>
                        <?php #echo $data['total_sum']; ?>
                    </b>
                </td>
                <td><b>RUB</b></td>
            </tr>
            </tfoot>
        </table>
    </div>

</section>

