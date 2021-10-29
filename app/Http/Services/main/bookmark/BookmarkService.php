<?

namespace App\Http\Services\main\bookmark;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkService
{

    public function store($id)
    {

        $userId = Auth::id();

        $userBookmark = Bookmark::where("user_id", $userId)->get();

        if($userBookmark->isEmpty()){

            $bookmark = Bookmark::create(["user_id" => $userId]);
            $bookmarkId = $bookmark->id;
        }else{
            $bookmark = Bookmark::findOrFail($userBookmark->first()->id);

            $bookmark->touch();
        }
        if($bookmark->products->contains($id)){

        }else{

            $bookmark->products()->attach($id);
        }
    }

    public function destroy($productId)
    {
        $userId = Auth::id();

        $product = Bookmark::where("user_id", $userId)->first()->products()->detach($productId);
    }
}