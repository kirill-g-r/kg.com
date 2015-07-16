<section>
    <h4>SETTINGS</h4>
    </BR>
    <h5>Your category list:</h5>
    </BR>

    <form method="post" >
        <div class="row uniform">
            <div class="12u$">
                <input type="text" name="add_new_category_name" id="add_new_category_name" value="" placeholder="Category Name" required autofocus />
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
                    <li><input type="button" value="Add new" class="special" onclick="addNewCategory()"/></li>
                    <li><input type="reset" value="Reset" /></li>
                </ul>
            </div>
        </div>
    </form>
</section>

<br/>

<section>

    <h5>Category List</h5>

    <div class="table-wrapper">
        <table class="alt" >
            <thead>
            <tr>
                <th>Category</th>
                <th>Category ID</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($data['category_list'] as $d) {
                if ($d['id_user'] != 0) {
                    $row = '<td style="text-align:center; cursor:pointer;" onclick="delete_user_category(' . $d['id'] . ');" class="icon fa-trash"></td>';
                } else {
                    $row = '<td></td>';

                }

                echo '<tr><td>'.$d['category'].'</td><td>'.$d['id'].'</td>'.$row.'</tr>';

            }

            ?>
            </tbody>
        </table>
    </div>

</section>
