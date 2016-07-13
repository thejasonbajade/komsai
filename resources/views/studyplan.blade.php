@extends('profile')
@section('rightPanel')
<style type="text/css">
	.s-label{
		text-align: left;
		width: 250px;
	}
	select>option.s-label{
		width: 280px;
	}
	.komsai-subjects{
		width: 80px; 
		color: black; 
		font-weight: bolder; 
		text-align: center; 
	}
	.non-komsai{
		font-weight: oblique;
		color: green;
		font-weight: bolder;
	}
	td > input{
		text-align: center;
	}
	.grades{
		width: 80px;
	}
	td > input.input-subj{
	}
</style>
<div class="col-md-12 col-xs-12 col-xs-offset-0 remove-padding" id="rightPanel">
	<div class="col-md-12" id="rightPanelContent">
		<h1> Study Plan </h1>
		<div class="col-md-10 col-md-offset-1">
		<form action="{{ url($nameUrl.'/updateStudyPlan') }}" method="post">
			{!! csrf_field() !!}
					<h4 class="yearlevel">FIRST YEAR</h4>
		<hr/>
		<h5 class="semester">First Semester</h5><br/>
			<table>
				<thead>
					<th>Subject</th>
					<th>Subject Title </th>
					<th>Units</th>
					<th>Grade</th>
				</thead>
				<tbody>
					<tr>	
						<td>GE (AH) 1</td>
						<?php
							 if (array_search(0,$slots,true) != False) {
								$grades=$subjects[0]->grades; $name1=$subjects[0]->subject_name; 
								}
							else{
								$grades=""; $name1=""; 
							}
						?>
							<td><input type="text" name="0" value="@if($name1 != '') {{$name1}} @endif" @if($name1 != "") {{"disabled"}} @endif placeholder="AH 1" class="form-control s-label" /></td>
							<td> 3.0 </td>
							<td> <input type="text" name="0grades" value="@if($grades != "") {{$grades}} @endif" @if($grades != "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"/></td>
					</tr>
					<tr>				
						<td> GE (MST) 1</td>
						<?php if (array_search(1,$slots,true) != False) {
								$grades=$subjects[1]->grades; $name1=$subjects[1]->subject_name; 
								}
							else{
								$grades=""; $name1=""; 
							}
						?>
						<td><input type="text" name="1" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif placeholder="MST 1" class="form-control s-label" /></td>
						<td> 3.0 </td>
						<td> <input type="text" name="1grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif class="non-komsai form-control grades" placeholder="1.0"/></td>
					</tr>
					<tr>				
						<td>GE (SSP) 1</td>
						<?php if (array_search(2,$slots,true) != False) {
								$grades=$subjects[2]->grades; $name1=$subjects[2]->subject_name; 
								}
							else{
								$grades=""; $name1=""; 
							}
						?>
						<td><input type="text" name="2" class="form-control s-label" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif placeholder="SSP 1" /></td>
						<td> 3.0 </td>
						<td> <input type="text" name="2grades" class="non-komsai form-control grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" /></td> 
					</tr>
					<tr>
						<td>NSTP 1</td>
						<?php if (array_search(3,$slots,true) != False) {
								$grades=$subjects[3]->grades; $name1=$subjects[3]->subject_name; 
								}
							else{
								$grades=""; $name1=""; 
							}
						?>
						<td><input type="hidden" name="3" value="NSTP 1"/></td>
						<td> 3.0 </td>
						<td> <input type="text" name="3grades" class="non-komsai form-control grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0"/></td> 
					</tr>
					<tr>	
						<td>Math 17</td>
						<?php if (array_search(4,$slots,true) != False) {
								$grades=$subjects[4]->grades; $name1=$subjects[4]->subject_name; 
								}
							else{
								$grades=""; $name1=""; 
							}
						?>
						<td> Algebra &amp; Trigonometry <input type="hidden" name="4" value="Math 17" /></td>
						<td> 5.0 </td>
						<td> <input type="text" name="4grades" class="non-komsai form-control grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0"/></td> 
					</tr>
					<tr>				
						<td>CMSC 11</td>
						<?php if (array_search(5,$slots,true) != False) {
								$grades=$subjects[5]->grades; $name1=$subjects[5]->subject_name; 
								}
							else{
								$grades=""; $name1=""; 
							}
						?>
						<td> Introduction to Computer Science <input type="hidden" name="5" value="CMSC 11" /></td>
						<td> 3.0 </td>
						<td> <input readonly="readonly" name="5grades" class="komsai-subjects form-control grades" type="text" value="@if($grades != "") {{$grades}} @endif"  @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" /></td> 
					</tr>
					<tr>				
						<td> PE-1 1</td>
						<?php if (array_search(6,$slots,true) != False) {
								$grades=$subjects[6]->grades; $name1=$subjects[6]->subject_name; 
								}
							else{
								$grades=""; $name1=""; 
							}
						?>
						<td> PE 1<input type="hidden" name="6" value="PE 1" /></td>
						<td> 3.0 </td>
						<td> <input type="text" name="6grades" class="non-komsai form-control grades" value="@if($grades != '') {{$grades}} @endif"  @if($grades!= "") {{"disabled"}} @endif  placeholder="1.0" /></td> 
					</tr>
				</tbody>
			</table>
			<h4 class="yearlevel">SECOND YEAR</h4>
		<hr/>
		<h5 class="semester">First Semester</h5><br/>
		<table>
			<tbody>
				<thead>
					<th>Subject</th>
					<th>Subject Title </th>
					<th>Units</th>
					<th>Grade</th>
				</thead>
				<tr>				
					<td> GE (AH) 3</td>
					<?php if (array_search(15,$slots,true) != False) {
							$grades=$subjects[15]->grades; $name1=$subjects[15]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" name="15"class="form-control s-label" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif placeholder="AH 3" /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="15grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades" placeholder="1.0"/></td>
				</tr>
				<tr>				
					<td> GE (MST) 3</td>
					<?php if (array_search(16,$slots,true) != False) {
							$grades=$subjects[16]->grades; $name1=$subjects[16]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" class="form-control s-label" name="16" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif placeholder="MST 3" /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="16grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades" placeholder="1.0"/></td>
				</tr>
				<tr>				
					<td> GE (SSP) 3</td>
					<?php if (array_search(17,$slots,true) != False) {
							$grades=$subjects[17]->grades; $name1=$subjects[17]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" class="form-control s-label" name="17" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif  placeholder="SSP 3" /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="17grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades" /></td>
				</tr>
				<tr>				
					<td> Physics 51 </td>
					<?php if (array_search(18,$slots,true) != False) {
							$grades=$subjects[18]->grades; $name1=$subjects[18]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> General Physics 1</td>
					<input type="hidden" name="18" value="Physics 51"/>
					<td> 3.0 </td>
					<td> <input  type="text" name="18grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades" /></td>
				</tr>
				<tr>				
					<td> Physics 51.1 </td>
					<?php if (array_search(19,$slots,true) != False) {
							$grades=$subjects[19]->grades; $name1=$subjects[19]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> General Physics 1 Laboratory </td>
					<input type="hidden" name="19" value="Physics 51.1"/>
					<td> 3.0 </td>
					<td> <input type="text" name="19grades" class="non-komsai form-control grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0"></td>
				</tr>
				<tr>				
					<td> CMSC 22</td>
					<?php if (array_search(20,$slots,true) != False) {
							$grades=$subjects[20]->grades; $name1=$subjects[20]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Fundamentals of Object-Oriented Programming</td>
					<input type="hidden" name="20" value="CMSC 22"/>
					<td> 3.0 </td>
					<td> <input type="text" name="20grades" readonly="readonly" class="komsai-subject form-control grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" /></td>
				</tr>
				<tr>				
					<td> CMSC 57</td>
					<?php if (array_search(21,$slots,true) != False) {
							$grades=$subjects[21]->grades; $name1=$subjects[21]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Discrete Mathematical Structures in Computer Science 2</td>
					<input type="hidden" name="21" value="CMSC 57"/>
					<td> 3.0 </td>
					<td> <input type="text" name="21grades" readonly="readonly" class="komsai-subject form-control grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" /></td>
				</tr>
				<tr>				
					<td> PE 2</td>
					<?php if (array_search(22,$slots,true) != False) {
							$grades=$subjects[22]->grades; $name1=$subjects[22]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> </td>
					<input type="hidden" name="22" value="PE 2"/>
					<td> 2.0 </td>
					<td> <input type="text" name="22grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"></td>
				</tr>
			</tbody>
		</table>
		<br/><h5 class="semester">Second Semester</h5><br/>
		<table>
			<tbody>
				<thead>
					<th>Subject</th>
					<th>Subject Title </th>
					<th>Units</th>
					<th>Grade</th>
				</thead>
				<tr>				
					<td>GE (AH) 4</td>
					<?php if (array_search(23,$slots,true) != False) {
							$grades=$subjects[23]->grades; $name1=$subjects[23]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" class="form-control s-label" name="23" placeholder="AH 4" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif  /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="23grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"></td>
				</tr>
				<tr>				
					<td> GE (MST) 4</td>
					<?php if (array_search(24,$slots,true) != False) {
							$grades=$subjects[24]->grades; $name1=$subjects[24]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text"  name="24" class="form-control s-label" placeholder="MST 4" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif  /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="24grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif  placeholder="1.0" class="non-komsai form-control grades"></td>
				</tr>
				<tr>				
					<td> GE (SSP) 4</td>
					<?php if (array_search(25,$slots,true) != False) {
							$grades=$subjects[25]->grades; $name1=$subjects[25]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" name="25" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif class="form-control s-label" placeholder="SSP 4" /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="25grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif  placeholder="1.0" class="non-komsai form-control grades"></td>
				</tr>
				<tr>				
					<td> Physics 52 </td>
					<?php if (array_search(26,$slots,true) != False) {
							$grades=$subjects[26]->grades; $name1=$subjects[26]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> General Physics 2 </td>
					<input type="hidden" name="26" value="Physics 52"/>
					<td> 3.0 </td>
					<td> <input type="text" name="26grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"></td>

				</tr>
				<tr>				
					<td> Physics 52.1 </td>
					<?php if (array_search(27,$slots,true) != False) {
							$grades=$subjects[27]->grades; $name1=$subjects[27]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> General Physics 2 Laboratory </td>
					<input type="hidden" name="27" value="Physics 52.1"/>
					<td> 1.0</td>
					<td> <input type="text" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif name="27grades" placeholder="1.0" class="non-komsai form-control grades"></td>

				</tr>
				<tr>				
					<td> CMSC 130</td>
					<?php if (array_search(28,$slots,true) != False) {
							$grades=$subjects[28]->grades; $name1=$subjects[28]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Logic Design and Digital Circuits</td>
					<input type="hidden" name="28" value="CMSC 130"/>
					<td> 3.0 </td>
					<td> <input type="text" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif name="28grades" readonly="readonly" class="komsai-subjects form-control grades" placeholder="1.0" /></td>

				</tr>
				<tr>				
					<td> CMSC 123</td>
					<?php if (array_search(29,$slots,true) != False) {
							$grades=$subjects[29]->grades; $name1=$subjects[29]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Data Structures </td>
					<input type="hidden" name="29" value="CMSC 123"/>
					<td> 3.0 </td>
					<td> <input type="text" readonly="readonly" name="29grades" class="komsai-subjects form-control grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" /></td>

				</tr>
				<tr>				
					<td> PE 2</td>
					<?php if (array_search(30,$slots,true) != False) {
							$grades=$subjects[30]->grades; $name1=$subjects[30]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> 1 </td>
					<input type="hidden" name="30" value="PE 2"/>
					<td> 2.0 </td>
					<td> <input type="text" name="30grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"></td>

				</tr>
			</tbody>
		</table>
		<br/>
		<h4 class="yearlevel">THIRD YEAR</h4>
		<hr/>
		<h5 class="semester">First Semester</h5><br/>
		<table>
			<tbody>
				<thead>
					<th>Subject</th>
					<th>Subject Title </th>
					<th>Units</th>
					<th>Grade</th>
				</thead>
				<tr>				
					<td>GE (AH) 5</td>
					<?php if (array_search(31,$slots,true) != False) {
							$grades=$subjects[31]->grades; $name1=$subjects[31]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" value="@if($name1 != "") {{$name1}} @endif" @if($name1!= "") {{"disabled"}} @endif class="form-control s-label" name="31" placeholder="AH 5" /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="31grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"></td>

				</tr>
				<tr>				
					<td> CMSC 127 </td>
					<?php if (array_search(32,$slots,true) != False) {
							$grades=$subjects[32]->grades; $name1=$subjects[32]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> File Processing &amp; Data Base Systems </td>
					<input type="hidden" name="32" value="CMSC 127"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="32grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td> CMSC 128 </td>
					<?php if (array_search(33,$slots,true) != False) {
							$grades=$subjects[33]->grades; $name1=$subjects[33]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Software Engineering 1 </td>
					<input type="hidden" name="33" value="CMSC 128"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="33grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades"></td>
				</tr>
				<tr>				
					<td> CMSC 131</td>
					<?php if (array_search(34,$slots,true) != False) {
							$grades=$subjects[34]->grades; $name1=$subjects[34]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Introduction to Computer Organization &amp; Machine Level Programming </td>
					<input type="hidden" name="34" value="CMSC 131"/>
					<td> 3.0 </td>
					<td> <input  type="text" name="34grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td> CMSC 141</td>
					<?php if (array_search(35,$slots,true) != False) {
							$grades=$subjects[35]->grades; $name1=$subjects[35]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Automata &amp; Language Theory </td>
					<input type="hidden" name="35" value="CMSC 141"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="35grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td> Stat 105</td>
					<?php if (array_search(36,$slots,true) != False) {
							$grades=$subjects[36]->grades; $name1=$subjects[36]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Introduction to Statistical Analysis </td>
					<input type="hidden" name="36" value="STAT 105"/>
					<td> 3.0 </td>
					<td> <input type="text" name="36grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"/></td>
				</tr>
			</tbody>
		</table><br/>
		<h5 class="semester">Second Semester</h5><br/>
		<table>
			<tbody>
				<thead>
					<th>Subject</th>
					<th>Subject Title </th>
					<th>Units</th>
					<th>Grade</th>
				</thead>
				<tr>				
					<td> CMSC 124</td>
					<?php if (array_search(37,$slots,true) != False) {
							$grades=$subjects[37]->grades; $name1=$subjects[37]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Design and Implementation of Programming Languages </td>
					<input type="hidden" name="37" value="CMSC 124"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="37grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td> CMSC 125</td>
					<?php if (array_search(38,$slots,true) != False) {
							$grades=$subjects[38]->grades; $name1=$subjects[38]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Operating Systems </td>
					<input type="hidden" name="38" value="CMSC 125"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="38grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td> CMSC 132</td>
					<?php if (array_search(39,$slots,true) != False) {
							$grades=$subjects[39]->grades; $name1=$subjects[39]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Computer Architecture </td>
					<input type="hidden" name="39" value="CMSC 132"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="39grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td>CMSC 126</td>
					<?php if (array_search(40,$slots,true) != False) {
							$grades=$subjects[40]->grades; $name1=$subjects[40]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Web Engineering </td>
					<input type="hidden" name="40" value="CMSC 126"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="40grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td> CMSC 129</td>
					<?php if (array_search(41,$slots,true) != False) {
							$grades=$subjects[41]->grades; $name1=$subjects[41]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Software Engineering 2 </td>
					<input type="hidden" name="41" value="CMSC 129"/>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="41grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>
				</tr>
				<tr>				
					<td> Eng 10</td>
					<?php if (array_search(42,$slots,true) != False) {
							$grades=$subjects[42]->grades; $name1=$subjects[42]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Writing of Scientific Papers </td>
					<input type="hidden" name="42" value="Eng 10"/>
					<td> 3.0 </td>
					<td> <input type="text" name="42grades" value="@if($grades != "") {{$grades}} @endif" @if($grades!= "") {{"disabled"}} @endif placeholder="1.0" class="non-komsai form-control grades"></td>
				</tr>
			</tbody>
		</table>
		<br/>
		<br/>
		<h4 class="yearlevel">FOURTH YEAR</h4>
		<hr/>
		<h5 class="semester">First Semester</h5><br/>
		<table>
			<tbody>
				<thead>
					<th>Subject</th>
					<th>Subject Title </th>
					<th>Units</th>
					<th>Grade</th>
				</thead>
				<tr>				
					<td>Elective 1</td>
					<?php if (array_search(43,$slots,true) != False) {
							$grades=$subjects[43]->grades; $name1=$subjects[43]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" name="43" class="form-control s-label" placeholder="Elective 1" value="@if($name1 != "") {{$name1}} @endif" @if($name1 != '') {{"disabled"}} @endif placeholder="" /></td>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="43grades" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>

				</tr>
				<tr>				
					<td> Elective 2</td>
					<?php if (array_search(44,$slots,true) != False) {
							$grades=$subjects[44]->grades; $name1=$subjects[44]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="" name="44" class="form-control s-label" placeholder="Elective 2" value="@if($name1 != "") {{$name1}} @endif"  @if($name1 != '') {{"disabled"}} @endif/></td>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="44grades" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades" /></td>

				</tr>
				<tr>				
					<td> GE (SSP) 5</td>
					<?php if (array_search(45,$slots,true) != False) {
							$grades=$subjects[45]->grades; $name1=$subjects[45]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" name="45" value="@if($name1 != "") {{$name1}} @endif" @if($name1 != '') {{"disabled"}} @endif class="form-control s-label" placeholder="SSP 5" /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="45grades" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif  placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
				<tr>				
					<td> CMSC 142</td>
					<?php if (array_search(46,$slots,true) != False) {
							$grades=$subjects[46]->grades; $name1=$subjects[46]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Design &amp; Analysis of Algorithms </td>
					<input type="hidden" name="46" value="CMSC 142"/>
					<td> 3.0 </td>
					<td> <input type="text" readonly value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif name="46grades" placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
				<tr>				
					<td> CMSC 137</td>
					<?php if (array_search(47,$slots,true) != False) {
							$grades=$subjects[47]->grades; $name1=$subjects[47]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Data Communications and Networking </td>
					<input type="hidden" name="47" value="CMSC 137"/>
					<td> 3.0 </td>
					<td> <input readonly type="text" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif name="47grades" placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
				<tr>				
					<td> CMSC 192</td>
					<?php if (array_search(48,$slots,true) != False) {
							$grades=$subjects[48]->grades; $name1=$subjects[48]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Ethical and Professional Issues in Computing</td>
					<td> 3.0 </td>
					<td> <input readonly type="text" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif name="48grades" placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
				<tr>				
					<td> CMSC 198.1</td>
					<?php if (array_search(49,$slots,true) != False) {
							$grades=$subjects[49]->grades; $name1=$subjects[49]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Special Problem </td>
					<td> 3.0 </td>
					<td> <input readonly type="text" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif name="49grades" placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
			</tbody>
		</table>
		<br/>
		<h5 class="semester">Second Semester</h5>
		<br/>
 			<tbody>
		<table>
				<thead>
					<th>Subject</th>
					<th>Subject Title </th>
					<th>Units</th>
					<th>Grade</th>
				</thead>
				<tr>				
					<td>Free Elective</td>
					<?php if (array_search(50,$slots,true) != False) {
							$grades=$subjects[50]->grades; $name1=$subjects[50]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" name="50" placeholder="Free Elective" class="form-control s-label" value="@if($name1 != "") {{$name1}} @endif"  @if($name1 != '') {{"disabled"}} @endif /></td>
					<td> 3.0 </td>
					<td> <input type="text" name="50grades" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades"/></td>

				</tr>
				<tr>				
					<td>Elective 3</td>
					<?php if (array_search(51,$slots,true) != False) {
							$grades=$subjects[51]->grades; $name1=$subjects[51]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" name="51" class="form-control s-label" value="@if($name1 != "") {{$name1}} @endif"  @if($name1 != '') {{"disabled"}} @endif placeholder="Elective 3" /></td>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="51grades" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades"/></td>

				</tr>
				<tr>				
					<td>Elective 4</td>
					<?php if (array_search(52,$slots,true) != False) {
							$grades=$subjects[52]->grades; $name1=$subjects[52]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td>  <input type="text" name="52" value="@if($name1 != "") {{$name1}} @endif"  @if($name1 != '') {{"disabled"}} @endif class="form-control s-label" placeholder="Elective 4" /></td>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="52grades" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
				<tr>				
					<td>Elective 5</td>
					<?php if (array_search(53,$slots,true) != False) {
							$grades=$subjects[53]->grades; $name1=$subjects[53]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> <input type="text" name="53" class="form-control s-label" placeholder="Elective 5" value="@if($name1 != "") {{$name1}} @endif"  @if($name1 != '') {{"disabled"}} @endif /></td>
					<td> 3.0 </td>
					<td> <input readonly="readonly" type="text" name="53grades" value="@if($grades != '') {{$grades}} @endif" @if($grades != '') {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
				<tr>				
					<td>CMSC 198.2</td>
					<?php if (array_search(54,$slots,true) != False) {
							$grades=$subjects[54]->grades; $name1=$subjects[54]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> Special Problem </td>
					<td> 5.0 </td>
					<td> <input readonly="readonly" type="text" name="54grades" value="@if($grades != "") {{$grades}} @endif"  @if($grades != '') {{"disabled"}} @endif placeholder="1.0" class="komsai-subjects form-control grades"></td>

				</tr>
				<tr>				
					<td>PI 100</td>
					<?php if (array_search(55,$slots,true) != False) {
							$grades=$subjects[55]->grades; $name1=$subjects[55]->subject_name; 
							}
						else{
							$grades=""; $name1=""; 
						}
					?>
					<td> The Life &amp; Works of Jose Rizal </td>
					<td> 3.0 </td>
					<td> <input type="text" value="@if($name1 != "") {{$name1}} @endif"  @if($name1 != '') {{"disabled"}} @endif name="55grades" placeholder="1.0" class="non-komsai form-control grades"></td>		
				</tr>
			</tbody>
		</table>

		<div>
			<span><input type="submit" role="button" class="btn btn-success" value="Update Study Plan" /></span>
		</div>
	
		</form>
		</
	</div>
</div>
@endsection