// app/Models/Product.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    // Daftar kolom yang boleh diisi massal
    protected $fillable = ['name', 'description', 'price'];

    // Relasi: satu produk punya banyak CartItem
    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
