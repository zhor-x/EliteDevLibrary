<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Author
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AuthorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Author newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Author query()
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Author extends Model
{
    use HasFactory;
}
