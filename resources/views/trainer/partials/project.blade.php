<h5 style="text-align: left;margin-left: 10px ;margin-top: 30px">Project</h5>
            <table style="margin-top: 10px; width: 99%; border: 2px solid black; border-collapse: collapse;">
                <colgroup>
                    <col style="width: 300px;">
                    <col style="width: ">
                    <col style="width: 10px;">
                </colgroup>

                <tr style="background-color: grey">
                    <th style="border: 1px solid black;">
                        <span>Module name</span>
                    </th>
                    <th style="border: 1px solid black;">Status</th>
                    <th style="border: 1px solid black;">Grade</th>
                </tr>
                <tbody id="projectTable">
                <tr id="row1">
                    <td style="border: 1px solid black; width: 2%">
                        <input type="text" name="projectName">
                    </td>
                    <td style="border: 1px solid black;">
                        <input type="checkbox" name="projectStatus1[]" value="Has project" style="display: inline-block;margin-left: 10px; ">
                        <label for="disregarded" style="display: inline-block; margin-right: 30px;">Has project</label>
                        <input type="checkbox" name="projectStatus1[]" value="not working" style="display: inline-block; ">
                        <label for="disregarded" style="display: inline-block; margin-right: 40px;">not working</label>
                        <input type="checkbox" name="projectStatus1[]" value="on time" style="display: inline-block; ">
                        <label for="disregarded" style="display: inline-block; margin-right: 10px;">on time</label>
                    </td>
                    <td style="border: 1px solid black;">
                        <input type="text" name="projectGrade">
                    </td>
                </tr>
            </table>
        </form>

