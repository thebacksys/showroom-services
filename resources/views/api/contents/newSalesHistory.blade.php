<h2 id="newSalesHistory">4. เพิ่มประวัติการขายรถ โดยมีการคืน response เป็น record ของประวัติการขายที่ทำการเพิ่มเข้ามา
</h2>
<pre class="highlight http tab-http" style=""><code><span class="nf">POST</span><span class="nn"> {{ env('API_ENDPOINT') }}/newSalesHistory</span> <span class="k">HTTP</span><span class="o">/</span><span class="m">1.1</span>
<span class="na">Content-Type</span><span class="p">:</span> <span class="s">application/json</span>
</code>
</pre>
<blockquote>
    <p>ตัวอย่าง request body</p>
</blockquote>
<p><code>POST {{ env('API_ENDPOINT') }}/newSalesHistory</code></p>
<h3>Request Body</h3>
<pre><code id="request_newSalesHistory"></code></pre>
<table>
    @include('api.components.requestHeaderTable')
    <tbody>
        <tr>
            <td>employeeId</td>
            <td>integer</td>
            <td>M</td>
            <td>ID ของพนักงาน</td>
        </tr>
        <tr>
            <td>vehicleModelId</td>
            <td>integer</td>
            <td>M</td>
            <td>ID ของรุ่นรถ</td>
        </tr>
        <tr>
            <td>vehicleBrandId</td>
            <td>integer</td>
            <td>M</td>
            <td>ID ของยี่ห้อรถ</td>
        </tr>
    </tbody>
</table>
<blockquote>
    <p>ตัวอย่าง response body</p>
</blockquote>
<pre><code id="response_newSalesHistory"></code></pre>
<h3>Response Body</h3>
<table>
    @include('api.components.responseHeaderTable')
    <tbody>
        <tr>
            <td>success</td>
            <td>boolean</td>
            <td>สถานะ</td>
        </tr>
        <tr>
            <td>description</td>
            <td>string</td>
            <td>รายละเอียดสถานะ</td>
        </tr>
        <tr>
            <td>data</td>
            <td>object</td>
            <td>ข้อมูลการขายที่เพิ่ม</td>
        </tr>
        <tr>
            <td>employee_id</td>
            <td>integer</td>
            <td>ID พนักงาน</td>
        </tr>
        <tr>
            <td>vehicle_model_id</td>
            <td>integer</td>
            <td>ID รุ่นรถ</td>
        </tr>
        <tr>
            <td>vehicle_brand_id</td>
            <td>integer</td>
            <td>ID ยี่ห้อรถ</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>string</td>
            <td>วันที่เปลี่ยนแปลงข้อมูลล่าสุด</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>string</td>
            <td>วันที่สร้างข้อมูล</td>
        </tr>
        <tr>
            <td>id</td>
            <td>integer</td>
            <td>ID ของการขาย</td>
        </tr>
    </tbody>
</table>
@section('scripts')
    @parent
    <script type="text/javascript">
        $(function() {
            document.getElementById('request_newSalesHistory').innerHTML = prettyPrint({
                employeeId: 1,
                vehicleModelId: 1,
                vehicleBrandId: 1
            });
            document.getElementById('response_newSalesHistory').innerHTML = prettyPrint({
                "success": true,
                "description": "Success",
                "data": {
                    "employee_id": 1,
                    "vehicle_model_id": 1,
                    "vehicle_brand_id": 1,
                    "updated_at": "2022-10-22 14:27:05",
                    "created_at": "2022-10-22 14:27:05",
                    "id": 10
                }
            });
        });
    </script>
@endsection
