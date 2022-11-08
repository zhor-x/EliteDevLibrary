<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BookAuthor
 *
 * @property int $id
 * @property int $author_id
 * @property int $book_id
 * @method static \Database\Factories\BookAuthorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookAuthor whereId($value)
 * @mixin \Eloquent
 */
class BookAuthor extends Model
{
    use HasFactory;
}
