<section>
    <div class="row">
        <div class="9u 12u$(medium)">
            <h4>SUMMARY TABLE</h4>
        </div>
        <div class="3u 12u$(medium)">
            <a style="cursor:pointer;" onclick="summary_table_page_change('back');"><-</a>
            <a id="summary_table_page" value="<?php echo $data['summary_table_page']['value']; ?>"  > PAGE <?php echo $data['summary_table_page']['value']; ?> OF <?php echo $data['summary_table_page']['count']; ?> </a>
            <a style="cursor:pointer;" onclick="summary_table_page_change('foward');">-></a>
        </div>
    </div>
<!--
    <ul class="actions">
        <li><a href="#" class="button special icon fa-download">Icon</a></li>
        jkhkjh
        <li><a href="#" class="button icon fa-download">Icon</a></li>
    </ul>

   -->

</section>

<br/>

<section>

    <div class="table-wrapper" id="summary_table">
        <table class="alt" >
            <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Timestamp</th>
                <th>Coast</th>
                <th>Currency</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($data['summary_table'] as $d) {

                echo '<tr><td>'.$d['category'].'</td><td>'.$d['name'].'</td><td>'.$d['time'].'</td><td>'.$d['coast'].'</td><td>'.$d['currency'].'</td><td style="text-align:center; cursor:pointer;" onclick="delete_charge_from_summary_table('.$d['id'].');" class="icon fa-trash"></td></tr>';

            }

            ?>
            </tbody>
            <tfoot>
            <tr>

                <td colspan="3"><b>Total sum:</b></td>
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


