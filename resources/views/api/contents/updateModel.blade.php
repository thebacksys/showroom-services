<h2 id="updateModel">5.2 แก้ไข รุ่นรถ โดยมีการคืน response เป็น record ข้อมูลรถที่ทำการแก้ไข
</h2>
<pre class="highlight http tab-http" style=""><code><span class="nf">PUT</span><span class="nn"> {{ env('API_ENDPOINT') }}/updateModel</span> <span class="k">HTTP</span><span class="o">/</span><span class="m">1.1</span>
<span class="na">Content-Type</span><span class="p">:</span> <span class="s">application/json</span>
</code>
</pre>
<blockquote>
    <p>ตัวอย่าง request body</p>
</blockquote>
<p><code>POST {{ env('API_ENDPOINT') }}/updateModel</code></p>
<h3>Request Body</h3>
<pre><code id="request_updateModel"></code></pre>
<table>
    @include('api.components.requestHeaderTable')
    <tbody>
        <tr>
            <td>vehicleModelId</td>
            <td>integer</td>
            <td>M</td>
            <td>ID ของรุ่นรถที่ต้องการแก้ไข</td>
        </tr>
        <tr>
            <td>vehicleBrandId</td>
            <td>integer</td>
            <td>M</td>
            <td>ID ของยี่ห้อรถ</td>
        </tr>
        <tr>
            <td>name</td>
            <td>string</td>
            <td>M</td>
            <td>ชื่อรุ่นรถ</td>
        </tr>
    </tbody>
</table>
<blockquote>
    <p>ตัวอย่าง response body</p>
</blockquote>
<pre><code id="response_updateModel"></code></pre>
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
            <td>ข้อมูลรุ่นรถที่แก้ไข</td>
        </tr>
        <tr>
            <td>vehicle_brand_id</td>
            <td>integer</td>
            <td>ID ยี่ห้อรถ</td>
        </tr>
        <tr>
            <td>name</td>
            <td>string</td>
            <td>รุ่นรถ</td>
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
            <td>ID รุ่นรถ</td>
        </tr>
    </tbody>
</table>
@section('scripts')
    @parent
    <script type="text/javascript">
        $(function() {
            document.getElementById('request_updateModel').innerHTML = prettyPrint({
                vehicleModelId: 1,
                vehicleBrandId: 1,
                name: "Forturner"
            });
            document.getElementById('response_updateModel').innerHTML = prettyPrint({
                "success": true,
                "description": "Success",
                "data": {
                    "vehicle_brand_id": 1,
                    "name": "Forturner",
                    "updated_at": "2022-10-22 14:31:17",
                    "created_at": "2022-10-22 14:31:17",
                    "id": 2
                }
            });
        });
    </script>
@endsection
