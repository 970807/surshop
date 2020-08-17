import {request} from './request';
export function getDetail(id) {
  return request({
    url: './detail.php',
    params: {
      id
    }
  })
}

export class getDetailHeadInfo {
  constructor(id, title, newPrice, oldPrice, isFav) {
    this.id = id;
    this.title = title;
    this.newPrice = newPrice;
    this.oldPrice = oldPrice;
    this.isFav = isFav; // 是否已收藏商品
  }
}

