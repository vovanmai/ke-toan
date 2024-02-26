<?php

namespace App\Http\Controllers\User\User4;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User1\Contact\CreateContactRequest;
use App\Services\User\User1\Contact\StoreService;
use Exception;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{

    public function index ()
    {
        try {
            makeSEO([
                'title' => 'Giá vé thuyền thúng Rừng Dừa Bảy Mẫu Hội An',
                'description' => 'Khu du lịch sinh thái Rừng dừa Bảy Mẫu Hội An có giá vé gồm các hoạt động tham quan, trải nghiệm các hoạt động vui chơi giải trí trọn gói. Cụ thể mức giá như sau: Người lớn và trẻ em trên 1m3: 120k/thúng/2người (Bao gồm giá vào cổng 30k). Trẻ em dưới 1m: Miễn phí. Hotline hoặc Zalo đặt trước vé Rừng Dừa Bảy Mẫu Hội An giá rẻ, ưu đãi: 081.789.0015',
                'image' => customAsset('assets/user/user4/img/ve-rung-dua-bay-mau-hoi-an-ticket.jpg'),
            ]);
            return view('user.user4.ticket');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect()->route('user.index');
        }
    }
}
