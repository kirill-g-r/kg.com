<section>
    <h4>SUMMARY TABLE</h4>
</section>

<br/>

<section>

    <div class="table-wrapper" id="summary_table">
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

            foreach ($data['summary_table'] as $d) {

                echo '<tr><td>'.$d['category'].'</td><td>'.$d['name'].'</td><td>'.$d['coast'].'</td><td>'.$d['currency'].'</td><td>'.$d['time'].'</td><td style="text-align:center; cursor:pointer;" onclick="delete_charge_from_summary_table('.$d['id'].');" class="icon fa-trash"></td></tr>';

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
                <td><b>RUB</b></td>
            </tr>
            </tfoot>
        </table>
    </div>
</section>


