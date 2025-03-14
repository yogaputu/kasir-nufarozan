					<?php
						error_reporting(0);
						$b=$brg->row_array();
					?>
					<table>
						<tr>
		                    <th style="width:200px;"></th>
		                    <th>Nama Barang</th>
		                    <th>Satuan</th>
		                    <th>Harga(Rp)</th>
		                    <th>Jumlah</th>
												<th>Subtotal</th>
		                    <th>Keterangan</th>
		                </tr>
						<tr>
							<td style="width:auto;"></th>
							<td><input type="text" name="nabar" value="<?php echo $b['barang_nama'];?>" style="width:380px;margin-right:5px;" class="form-control input-sm"></td>
		                    <td><input type="text" name="satuan" id="satuan" value="<?php echo $b['barang_satuan'];?>" style="width:120px;margin-right:5px;" class="form-control input-sm" readonly></td>

												<input type="hidden" name="qty_jumlah" id="qty_jumlah" onFocus="startCalc();" onBlur="stopCalc();" >
												<input type="hidden" name="min_beli" id="min_beli" value="<?php echo $b["barang_min_beli"]; ?>">
												<input type="hidden" name="min_harga" id="min_harga" value="<?php echo $b["barang_min_harga"]; ?>">
												<input type="hidden" name="jaulharga" id="jualharga" value="<?php echo $b["barang_harjul"]; ?>">

		                    <td><input type="text" name="harjul" id="harjul" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $b['barang_harjul'];?>" style="width:120px;margin-right:5px;text-align:right;" class="form-control input-sm" readonly></td>
		                    <td><input type="number" name="qty" id="qty" min='0' class="form-control input-sm" style="width:90px;margin-right:5px;" onFocus="startCalc();" onBlur="stopCalc();" onchange="hitung_qty()" required></td>
												<td><input type="number" name="subtotal" id="subtotal" class="form-control input-sm" style="width:90px;margin-right:5px;" readonly></td>
		                    <td><input type="text" name="keterangan" id="diskon" class="form-control input-sm" style="width:140px;margin-right:5px;" required onclick="klik(this)"></td>
		                    <td><button type="submit" class="btn btn-sm btn-info"><span class="fa fa-refresh"></span> Retur</button></td>
						</tr>
					</table>
