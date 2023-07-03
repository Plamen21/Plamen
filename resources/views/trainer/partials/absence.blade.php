<h5 style="text-align: left;margin-left: 10px; margin-top: 30px;">Absences</h5>
<div style="text-align: left; margin-left: 10px;margin-top: 20px;">
    <input type="radio" id="wasLate" name="absenceReason" value="Was late" style="display: inline-block;">
    <label for="wasLate" style="display: inline-block; margin-right: 30px;">Was late</label>

    <input type="radio" id="escaped" name="absenceReason" value="Escaped" style="display: inline-block;">
    <label for="escaped" style="display: inline-block; margin-right: 30px;">Escaped</label>

    <input type="radio" id="didNotCome" name="absenceReason" value="Did not come" style="display: inline-block;">
    <label for="didNotCome" style="display: inline-block; margin-right: 500px;">Did not come</label>

    <input type="checkbox" id="disregarded" name="disregarded" value="disregarded" style="display: inline-block; ">
    <label for="disregarded" style="display: inline-block; margin-right: 10px;">Disregarded</label>
</div>
<div class="row">
    <div class="col-sm-10">
        <textarea class="form-control" name="absenseDescription" id="absenseDescription" rows="3" placeholder="Absence note / reason"
            style="margin-top: 10px;width: 120%;border:2px solid black"></textarea>
    </div>
</div>
</form>
