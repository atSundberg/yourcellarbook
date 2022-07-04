<!-- <section class="section">
    <span x-html="bodyData"></span>
</section> -->

<script>
    function SLComp() {
        return {
            stocks: [],

            fetchInfo() {
                if (this.stocks.length > 0) {
                    return;
                }
                fetch('./api/v1/stocks').then((response) => response.json()).then(json => {
                    console.log("stocks.Rcv:", json)
                    this.stocks = json.data

                    // Fix the data...
                    this.stocks = this.stocks.map(rec => ({
                        ...rec,
                        level: ((rec["last_close"] - rec["stop_loss"]) / rec["last_close"]) * 100,
                    }));

                    console.log("stocks.2:", this.stocks)
                }).catch(function() {
                    console.log("Problem fetching!")
                })
            }
        }
    }

    function RegComp() {
        const FORM_URL = "./api/v1/cmd/stockadd";
        return {
            open: false,
            formLoading: false,
            formMessage: "",
            formData: {
                name: '',
                email: '',
                pwd: '',
                ticker: '',
            },
            submitForm() {
                console.log(JSON.stringify(this.formData));
                this.formLoading = false;
                this.formMessage = "";
                fetch(FORM_URL, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(this.formData),
                    })
                    .then(() => {
                        this.formData.name = "";
                        this.formData.email = "";
                        this.formData.pwd = "";
                        this.formData.ticker = "";
                        this.formMessage = "Form successfully submitted.";
                    })
                    .catch(() => {
                        this.formMessage = "Something went wrong.";
                    })
                    .finally(() => {
                        this.formLoading = false;
                    });
            },
        }
    }
</script>
<template x-if="selPage == 'about'">
    <div class="columns is-centered">
        <div class="column is-two-thirds">
            <section class="section" x-data="RegComp()">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Add a new wine to your collection
                        </p>
                        <button class="card-header-icon" aria-label="more options">
                            <span class="icon">
                                <i class="fas fa-wine-bottle"></i>
                            </span>
                        </button>
                    </header>
                    <div class="card-content">
                        <div class="content">

                            <form @submit.prevent="submitForm">
                                <div class="field">
                                    <label class="label">*Name:</label>
                                    <input class="input" type="text" name="name" required x-model="formData.name" />
                                </div>
                                <div class="field">
                                    <label class="label">*Vintage:</label>
                                    <input class="input" type="number" name="name" required x-model="formData.name" />
                                </div>
                                <div class="field">
                                    <label class="label">*Producer:</label>
                                    <input class="input" type="text" name="name" required x-model="formData.name" />
                                </div>
                                <div class="field">
                                    <label class="label">*Region:</label>
                                    <input class="input" type="email" name="name" required x-model="formData.email" />
                                </div>
                                <div class="field">
                                    <label class="label">*Country:</label>
                                    <input class="input" type="text" name="country" required x-model="formData.pwd" />
                                </div>
                                <div class="field">
                                    <label class="label">*Quantity (in your collection):</label>
                                    <input class="input" type="number" name="quantity" required x-model="formData.ticker" />
                                </div>
                                <div class="field">
                                    <label class="label">Information:</label>
                                    <textarea class="textarea" placeholder="Describe what you know about the wine and the producer..."></textarea>
                                </div>
                                <p>* Required field</p>

                                <div class="field is-grouped is-grouped-right">
                                    <div class="control">
                                        <button class="button is-link is-light">Cancel</button>
                                    </div>
                                    <div class="control">
                                        <button :disabled="formLoading" class="button is-link">Submit</button>
                                    </div>
                                </div>

                            </form>

                            <!-- <form @submit.prevent="submitForm">
                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Vintage:</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" type="number" placeholder="1996">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Name:</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" type="text" placeholder="Le Petit Cheval">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Producer:</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" type="text" placeholder="Chateau Cheval Blanc">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Region:</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" type="text" placeholder="Saint-Émilion">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Country:</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" type="text" placeholder="France">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Quantity:</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input" type="number" placeholder="12">
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-grouped is-grouped-right">
                                    <div class="control">
                                        <button class="button is-link is-light">Cancel</button>
                                    </div>
                                    <div class="control">
                                        <button :disabled="formLoading" class="button is-link">Submit</button>
                                    </div>
                                </div>

                            </form> -->

                            <div x-text="formMessage"></div>



                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<!-- </section>
</template> -->

<template x-if="selPage == 'home'">
    <section class="section" x-data="SLComp()" x-init="fetchInfo()">
        <div class="container">
            <div class="is-size-3 has-text-centered">All wines</div>
            <div class="content">
                <table class="table is-striped is-fullwidth is-hoverable">
                    <thead>
                        <tr>
                            <th>Vintage</th>
                            <th>Name</th>
                            <th>Producer</th>
                            <th>Region</th>
                            <th>Country</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <template x-for="rec in stocks" :key="rec.ticker"> -->
                        <tr>
                            <td>2019</td>
                            <td>La Tache</td>
                            <td>Domaine de la Romanée Contí</td>
                            <td>Burgundy</td>
                            <td>France</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>2020</td>
                            <td>Susucaru Rossato</td>
                            <td>Frank Cornelissen</td>
                            <td>Etna</td>
                            <td>Italy</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>2016</td>
                            <td>Le Puy</td>
                            <td>Chateau le Puy</td>
                            <td>Saint Emilion</td>
                            <td>France</td>
                            <td>1</td>
                        </tr>
                        <!-- <tr>
                                <td><span x-text="rec.ticker">Ticker</span></td>
                                <td><span x-text="rec.first_close">first_close</span></td>
                                <td><span x-text="rec.stop_loss">stop_loss</span></td>
                                <td><span x-text="rec.last_close">last_close</span></td>
                                <td><span x-text="rec.level">level</span>
                                    <i class="fa-regular fa-thumbs-up"></i>
                                    <i class="fa-regular fa-circle-xmark"></i>
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <i class="fa-solid fa-skull-crossbones"></i>
                                </td>
                                <td><span x-text="rec.created_at">created_at</span></td>
                                <td><span x-text="rec.updated_at">updated_at</span></td>
                            </tr> -->
                        <!-- </template> -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</template>
<!--    - - >
    <p>selPage:<span x-text="selPage">p-span</span></p>
< ! - - -->