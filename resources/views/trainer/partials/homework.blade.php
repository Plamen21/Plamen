<h5 style="text-align: left;margin-left: 10px ;margin-top: 30px">Homework</h5>
            <table style="margin-top: 10px; width: 99%; border: 2px solid black; border-collapse: collapse;">
                <colgroup>
                    <col style="width: 300px;">
                    <col style="width: ">
                    <col style="width: 10px;">
                </colgroup>
                <tr style="background-color: grey">
                    <th style="border: 1px solid black;">
                        <span>Lecture name</span>
                    </th>
                    <th style="border: 1px solid black;">Status</th>
                    <th style="border: 1px solid black;">Grade</th>
                </tr>
                <tbody id="homeworkTable">
                <tr id="row1">
                    <td style="border: 1px solid black; width: 2%">
                        <input type="text" name="homeworkName">
                    </td>
                    <td style="border: 1px solid black;">
                        <input type="checkbox" name="homeworkStatus1[]" value="Has homework" style="display: inline-block;margin-left: 10px; checked">
                        <label for="disregarded" style="display: inline-block; margin-right: 30px;">Has homework</label>
                        <input type="checkbox" name="homeworkStatus1[]" value="not working" style="display: inline-block;  ">
                        <label for="disregarded" style="display: inline-block; margin-right: 40px;">not working</label>
                        <input type="checkbox" name="homeworkStatus1[]" value="on time" style="display: inline-block; ">
                        <label for="disregarded" style="display: inline-block; margin-right: 10px;">on time</label>
                    </td>
                    <td style="border: 1px solid black;">
                        <input type="text" name="homeworkgrades">
                    </td>
                </tr>
            </table>
        </form>
