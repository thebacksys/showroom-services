<h2 id="getTotalSalesWithBrandByDate">1. ดึงข้อมูลจำนวนการขายรถของรถแต่ละยี่ห้อตามช่วงวันที่กำหนด</h2>
<pre class="highlight http tab-http" style=""><code><span class="nf">GET</span><span class="nn"> {{ env('API_ENDPOINT') }}/getTotalSalesWithBrandByDate</span> <span class="k">HTTP</span><span class="o">/</span><span class="m">1.1</span>
</code>
</pre>
<blockquote>
    <p>ตัวอย่าง request parameter</p>
</blockquote>
<p><code>POST {{ env('API_ENDPOINT') }}/getTotalSalesWithBrandByDate</code></p>
<h3>Request Body</h3>
<pre><code id="request_getTotalSalesWithBrandByDate"></code></pre>
<table>
    @include('api.components.requestHeaderTable')
    <tbody>
        <tr>
            <td>fromDate</td>
            <td>string</td>
            <td>M</td>
            <td>ตั้งแต่วันที่</td>
        </tr>
        <tr>
            <td>toDate</td>
            <td>string</td>
            <td>M</td>
            <td>จนถึงวันที่</td>
        </tr>
    </tbody>
</table>
<blockquote>
    <p>ตัวอย่าง response parameter</p>
</blockquote>
<pre><code id="response_getTotalSalesWithBrandByDate"></code></pre>
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
            <td>array</td>
            <td>ข้อมูลการขายของแต่ละยี่ห้อ</td>
        </tr>
        <tr>
            <td>brandId</td>
            <td>integer</td>
            <td>ID ของยี่ห้อรถ</td>
        </tr>
        <tr>
            <td>brand</td>
            <td>string</td>
            <td>ยี่ห้อรถ</td>
        </tr>
        <tr>
            <td>totalSales</td>
            <td>integer</td>
            <td>จำนวนการขาย</td>
        </tr>
    </tbody>
</table>
@section('scripts')
    @parent
    <script type="text/javascript">
        $(function() {
            document.getElementById('request_getTotalSalesWithBrandByDate').innerHTML =
                "{{ env('API_ENDPOINT') . '/' }}getTotalSalesWithBrandByDate?fromDate=2022-01-01&toDate=2022-12-31"
            document.getElementById('response_getTotalSalesWithBrandByDate').innerHTML = prettyPrint({
                "success": true,
                "description": "Success",
                "data": [{
                    "brandId": 1,
                    "brand": "Brand Test",
                    "totalSales": 9
                }]
            });
        });
    </script>
@endsection
